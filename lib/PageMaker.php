<?php
/*
PageMaker Markdown Engine
version eta
by Matteo Silvestro
CC BY 4.0
http://creativecommons.org/licenses/by/4.0/
last update: 05/03/2020

Simple PHP script that renders Markdown pages.
*/
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
    if ($lang == "en") {
        return "it";
    } else if ($lang == "it") {
        return "en";
    }
}

# Get the year from the last update constant defined at the beginning.
$last_update_exploded = explode('/', LAST_UPDATE); # this line is mandatory
$last_update_year = end($last_update_exploded);

# Get which language to display the page in.
if (empty($_GET['lang'])) {
    $lang = DEFAULT_LANGUAGE;
} else {
    $lang = $_GET['lang'];
    if (!in_array($lang, $SUPPORTED_LANGUAGES)) {
        $lang = DEFAULT_LANGUAGE;
    }
}

# Get the requeste page name.
if (empty($_GET['page'])) {
    $page_name = DEFAULT_PAGE;
} else {
    $page_name = $_GET['page'];
}

# Read the menu custom file, with this syntax:
/*
# en
home: Description
other_link: Other description

# it
home: Descrizione
altro_link: Altra descrizione
*/
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

# Get the Markdown file to use to render the requested page.
$page_filename = "pages/$lang/$page_name.md";
if (!file_exists($page_filename)) { # no file exists, show 404 error page
    $page_filename = "pages/$lang/404.md";
}
if (file_exists($page_filename)) {
    $page_md = file_get_contents($page_filename);
} else {
    $page_md = false;
}
if (!$page_md) {
    $page_md = "# Error

An error occurred.";
}

# If the page is 404, insert the page name.
$page_md = str_replace("<!-- page here -->", $page_name, $page_md);

# Parse the Markdown file.
$Parsedown = new ParsedownExtra();
$page_html = $Parsedown->text($page_md);

# Extract title and description from the page (first and second line).
# Title and description are used for both meta tags and to be displayed on the
# page.
list($page_title, $page_description) = get_page_title_and_description($page_md);
if ($page_name != "home") {
    $page_title = "$page_title &mdash; Matteo Silvestro";
}
?>
