<?php

include 'php/Parsedown.php';

$parsedown = new Parsedown();

function get_cards($pages) {
    $language_not_found = false;

    # Get which language to display the page in.
    if (empty($_GET['lang'])) {
        $page_lang = DEFAULT_LANGUAGE;
    } else {
        $page_lang = $_GET['lang'];
        if ($page_lang != OTHER_LANGUAGE) {
            $page_lang = DEFAULT_LANGUAGE;
            $language_not_found = true;
        }
    }

    # Get the requested page name.
    if (empty($_GET['page'])) {
        $page_name = $pages[$page_lang][DEFAULT_PAGE];
    } else {
        $page_name = $_GET['page'];
        if ($page_name == strtolower($pages[$page_lang][DEFAULT_PAGE])) {
            header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI']));
            exit();
        }
    }

    if ($language_not_found) {
        $page_name = "$_GET[lang]/$page_name";
    }

    # Get the Markdown file to use to render the requested page.
    $page_filename = "pages/$page_lang/$page_name.md";
    if (!file_exists($page_filename)) { # no file exists, show 404 error page
        $page_filename = "pages/$page_lang/404.md";
    }

    if (file_exists($page_filename)) {
        $page_title = ucfirst($page_name);
        $cards = process_markdown($page_filename);
    } else {
        $page_title = 'Error';
        $cards = array(
            'error' => array(
                'title' => 'Error',
                'right_column' => 'An error has occurred.',
                'left_column' => ''
            )
            );
    }

    return array($page_title, $page_lang, $cards);
}

function process_markdown($page_filename) {
    $fn = fopen($page_filename, 'r');

    $page_title = '';
    $cards = array();
    $current_card = NULL;
    $current_part = NULL;
    while (!feof($fn)) {
        $line = fgets($fn);
        if (substr($line, 0, 3) == '## ') {
            $page_title = trim(substr($line, 3));
        } elseif (substr($line, 0, 4) == '### ') {
            $card_title = trim(substr($line, 4));
            $cards[$card_title] = array(
                'title' => $card_title,
                'right_column' => '',
                'left_column' => ''
            );
            $current_card = $card_title;
            $current_part = 'right_column';
        } elseif ($current_part) {
            if ($current_part == 'right_column' && substr($line, 0, 3) == '---') {
                $current_part = 'left_column';
            } else {
                $cards[$current_card][$current_part] .= $line;
            }
        }
    }

    fclose($fn);

    return $cards;
}

function render_video_tags($html) {
    return preg_replace('/<!-- video=(.*) -->/i', '<div class="video-thumbnail" onclick="openVideo(this, \'${1}\')">
    <img src="https://img.youtube.com/vi/${1}/hqdefault.jpg">
    <div>⯈</div>
</div>', $html);
}

// Slugify a string (https://lucidar.me/en/web-dev/how-to-slugify-a-string-in-php/).
function slugify($text) {
    // Strip html tags.
    $text = strip_tags($text);
    // Replace non letter or digits by -.
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // Transliterate.
    setlocale(LC_ALL, 'en_US.utf8');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Remove unwanted characters.
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    // Remove duplicate -.
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) { return 'n-a'; }
    return $text;
}

function get_prefix($page_lang) {
    if ($page_lang == DEFAULT_LANGUAGE) {
        return '/';
    } else {
        return "/$page_lang/";
    }
}

function get_translation($pages, $page_title, $page_lang) {
    if ($page_lang == DEFAULT_LANGUAGE) {
        $other_lang = OTHER_LANGUAGE;
    } else {
        $other_lang = DEFAULT_LANGUAGE;
    }
    foreach ($pages[$page_lang] as $page_id => $page_name) {
        if ($page_name == $page_title) {
            if ($page_id == DEFAULT_PAGE) {
                return get_prefix($other_lang);
            } else {
                return get_prefix($other_lang).strtolower($pages[$other_lang][$page_id]);
            }
        }
    }
}

function get_markdown_source($page_title, $page_lang) {
    $page_name = strtolower($page_title);
    return "/pages/$page_lang/$page_name.md";
}

?>
