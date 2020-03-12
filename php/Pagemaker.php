<?php
# TODO add date management for cards.

include 'php/Parsedown.php';

$parsedown = new Parsedown();

# Slugify a string.
# from https://lucidar.me/en/web-dev/how-to-slugify-a-string-in-php/
function slugify($text) {
    # Strip html tags.
    $text = strip_tags($text);
    # Replace non letter or digits by -.
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    # Transliterate.
    setlocale(LC_ALL, 'en_US.utf8');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    # Remove unwanted characters.
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    # Remove duplicate -.
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) { return 'n-a'; }
    return $text;
}

# Get all the data to display the page requested in the language requested,
# reading the GET parameters.
function get_page_data($pages) {
    # To make the language selection independent of .htaccess, we allow any
    # language to be used (i.e. any two letter language identifier like 'it')
    # but treat the ones not supported as missing pages.
    $language_not_supported = false;

    # Get which language to display the page in.
    if (empty($_GET['lang'])) {
        $page_lang = DEFAULT_LANGUAGE;
    } else {
        $page_lang = $_GET['lang'];
        if ($page_lang != SECOND_LANGUAGE) { # deny non-supported languages
            $page_lang = DEFAULT_LANGUAGE;
            $language_not_supported = true;
        }
    }

    # Get the requested page name.
    if (empty($_GET['page'])) {
        # Select default page.
        $page_url = slugify($pages[$page_lang][DEFAULT_PAGE_ID]);
    } else {
        $page_url = $_GET['page'];
        if ($page_url == slugify($pages[$page_lang][DEFAULT_PAGE_ID])) {
            # If the requested page is the default one, redirect immediately
            # to the root path '/' (for better consistency).
            # This way you can access the default page only with '/'.
            # E.g. 'matteosilvestro.com/introduction' -> 'matteosilvestro.com/'
            header("Location: http://$_SERVER[HTTP_HOST]".
                    dirname($_SERVER['REQUEST_URI']));
            exit();
        }
    }

    if ($language_not_supported) {
        # This weird code just treats any non-supported language page request
        # into a default error page, just as if the .htaccess had not found
        # the requested page.
        # The .htaccess is made so that every two character string at the
        # beginning of a URL is treated as language, i.e.
        # 'ms.com/zn/title' -> lang=zn&page=title
        # but then, if the language is not supported, discard the request and
        # proceed as if the user meant the whole URL as the page title, i.e.
        # lang=zn&page=title -> zn not supported -> page=zn/title
        $page_url = "$_GET[lang]/$page_url";
    }

    # Get the Markdown file to use to render the requested page.
    $page_filename = "pages/$page_lang/$page_url.md";
    if (!file_exists($page_filename)) { # no file exists, show 404 error page
        $page_filename = "pages/$page_lang/404.md";
    }

    if (file_exists($page_filename)) {
        list($page_title, $page_description, $cards) =
            explode_page_markdown($page_filename);
    } else {
        $page_title = 'Error';
        $page_description = 'There was an error.';
        $cards = array(
            'error' => array(
                'title' => 'Error',
                'right_column' => 'An error has occurred.',
                'left_column' => ''
            )
            );
    }

    return array($page_lang, $page_title, $page_description, $cards);
}

# Transform the structured Markdown file for a page into its components, i.e.
# extract the page title and for each card:
# * card title;
# * content of the right column;
# * content of the left column.
function explode_page_markdown($page_filename) {
    $fn = fopen($page_filename, 'r');

    $page_title = '';
    $page_description = '';
    $cards = array(); # will contain all cards of the page
    $current_card = NULL; # keep track of the card we're reading
    $current_part = NULL; # keep track of the part of the card we're reading
    while (!feof($fn)) {
        # Read the file line by line.
        # First are the data related to the page:
        #   page_title           --> ## Page title
        #   page_description     --> Description
        # Then the data for each card:
        #   card_title           --> ### Card title
        #   card_date (optional) --> @ 12/03/2020
        #   right_column         --> Some *text* of the right column
        #                        ---
        #   left_column          --> Some *text* of the left column
        # All parts must be read as different Markdown files.
        $line = fgets($fn);
        if (substr($line, 0, 3) == '## ') {
            # If we have an h2 header (starting with ##) we read the page
            # title.
            $page_title = trim(substr($line, 3));
            $current_part = 'page_description';
        } elseif (substr($line, 0, 4) == '### ') {
            # If we have an h3 header (starting with ###) we read the card
            # title and we start the associative array to contain the other
            # card data we will read in the following lines.
            $card_title = trim(substr($line, 4));
            $cards[$card_title] = array(
                'title' => $card_title,
                'right_column' => '',
                'left_column' => ''
            );
            $current_card = $card_title; # we are starting to read a new card
            $current_part = 'card_date'; # precisely its right column
        } elseif ($current_part) {
            switch ($current_part) {
                case 'page_description':
                    $page_description .= $line;
                    break;
                case 'card_date':
                    if (!empty(trim($line))) {
                        # If the first non-empty line starts with a @, there is
                        # a date to extract...
                        if (substr($line, 0, 2) == '@ ') {
                            $cards[$current_card]['date'] =
                                trim(substr($line, 2));
                        # ... otherwise we are already into the right column.
                        } else {
                            $cards[$current_card]['right_column'] = $line;
                        }
                        $current_part = 'right_column';
                    }
                    break;
                case 'right_column':
                case 'left_column':
                    # An horizontal line means that we have finished the right 
                    # column and we should start reading the left column.
                    if ($current_part == 'right_column'
                        && substr($line, 0, 3) == '---') {
                        $current_part = 'left_column';
                    } else {
                        # Just add the line, is some Markdown formatted text
                        # for either the right or the left column.
                        $cards[$current_card][$current_part] .= $line;
                    }
                    break;
            }
        }
    }

    fclose($fn);

    return array($page_title, trim($page_description), $cards);
}

# Transform a custom video tag (e.g. '<!-- video=tyYpu07Jms0 -->') in an actual
# YouTube video thumbnail, that can be used to play the video directly on the
# webpage.
function render_video_tags($html) {
    return preg_replace('/<!-- video=(.*) -->/i',
'<div class="video-thumbnail" onclick="openVideo(this, \'${1}\')">
    <img src="https://img.youtube.com/vi/${1}/hqdefault.jpg">
    <div>⯈</div>
</div>', $html);
}

# Get the language prefix, that is empty for the default language.
function get_lang_prefix($page_lang) {
    if ($page_lang == DEFAULT_LANGUAGE) {
        return "/";
    } else {
        return "/$page_lang/";
    }
}

# Get the link to the page in the other language.
function get_translated_page($pages, $current_page_title, $page_lang) {
    if ($page_lang == DEFAULT_LANGUAGE) {
        $other_lang = SECOND_LANGUAGE;
    } else {
        $other_lang = DEFAULT_LANGUAGE;
    }
    if ($current_page_title == '404') {
        # If the page is not found, create the link between the 404 page in the
        # two languages.
        return get_lang_prefix($other_lang).'404';
    }
    foreach ($pages[$page_lang] as $page_id => $page_title) {
        # Search the name of the page in the other language.
        if ($page_title == $current_page_title) {
            if ($page_id == DEFAULT_PAGE_ID) {
                return get_lang_prefix($other_lang);
            } else {
                return get_lang_prefix($other_lang).
                       slugify($pages[$other_lang][$page_id]);
            }
        }
    }
}

# Get the Markdown source of the current page.
function get_markdown_source($page_title, $page_lang) {
    $page_url = slugify($page_title);
    return "/pages/$page_lang/$page_title.md";
}

?>
