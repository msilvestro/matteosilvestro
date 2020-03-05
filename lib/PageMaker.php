<?php

include 'lib/Parsedown.php';
include 'lib/ParsedownExtra.php';

function strip_markdown($markdown) {
    # function to remove markdown syntax and return plain text
    # works on a very resticted subset of markdown, but it is enough in this case
    return str_replace(["*", "**", "# "], "", $markdown);
}

function get_page_title_and_description($page_md) {
    # extract title and description from the page
    $str_array = explode(PHP_EOL, $page_md);
    $page_title = strip_markdown($str_array[0]);  # first non null line
    $page_description = strip_markdown($str_array[2]);  # second non null line
    return array($page_title, $page_description);
}

function get_other_language($lang) {
    # get the other language
    # TODO make it more flexible for different languages, not only en and it
    if ($lang == "en") {
        return "it";
    } else if ($lang == "it") {
        return "en";
    }
}

$last_update_exploded = explode('/', LAST_UPDATE);
$last_update_year = end($last_update_exploded);

# get the language to use
if (empty($_GET['lang'])) {
    $lang = DEFAULT_LANGUAGE;
} else {
    $lang = $_GET['lang'];
    if (!in_array($lang, $SUPPORTED_LANGUAGES)) {
        $lang = DEFAULT_LANGUAGE;
    }
}

# get the page to be displayed
if (empty($_GET['page'])) {
    $page_name = DEFAULT_PAGE;
} else {
    $page_name = $_GET['page'];
}
$page_filename = "pages/$lang/$page_name.md";
# if no page with such name exists, resort to the 404 error page
if (!file_exists($page_filename)) {
    $page_filename = "pages/$lang/404.md";
}

if (file_exists("pages/menu")) {
    $menu_file = trim(file_get_contents("pages/menu", "r"));
    $menu = array();
    $current_language = "";
    $current_index = 0;
    $foreign_page_index = 0;
    foreach (explode(PHP_EOL, $menu_file) as $menu_line) {
        if ($menu_line) {
            if (substr($menu_line, 0, 1) == '#') {
                $current_language = trim(substr($menu_line, 1));
                $menu[$current_language] = array();
                $current_index = 0;
            } else {
                $menu_parts = explode(':', $menu_line, 2);
                $short_name = trim($menu_parts[0]);
                $description = trim($menu_parts[1]);
                $menu[$current_language][$short_name] = $description;
                if ($current_language == $lang && $short_name == $page_name) {
                    $foreign_page_index = $current_index;
                }
                $current_index += 1;
            }
        }
    }
} else {
    $menu = false;
}

# URL of the same page but in another language
# i.e. the page "thesis" (en) becomes "tesi" (it)
$other_lan = get_other_language($lang);
$foreign_page_url = array_keys($menu[$other_lan])[$foreign_page_index];
# if the page is not in the default language (e.g. it), all pages
# are in /it/, so add it to url
if ($lang == DEFAULT_LANGUAGE) {
    $lang_prefix = "";
} else {
    $lang_prefix = "$lang/";
}

# open the page file and read it
if (file_exists($page_filename)) {
    $page_md = file_get_contents($page_filename);
} else {
    $page_md = false;
}
if (!$page_md) {
    $page_md = "# Error

An error occurred.";
}

# if the page is 404, insert the page name
$page_md = str_replace("<!-- page here -->", $page_name, $page_md);

# parse the markdown file
$Parsedown = new ParsedownExtra();
$page_html = $Parsedown->text($page_md);

# extract title and description from the page
list($page_title, $page_description) = get_page_title_and_description($page_md);
if ($page_name != "home") {
    $page_title = "$page_title &mdash; Matteo Silvestro";
}
?>
