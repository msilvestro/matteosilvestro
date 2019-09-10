<?php

function strip_markdown($markdown) {
    # function to remove markdown syntax and return plain text
    # works on a very resticted subset of markdown, but it is enough in this case
    return str_replace(["*", "**", "# "], "", $markdown);
}

function get_page_title_and_description($page_md) {
    # extract title and description from the page
    # TODO find a more robust way
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

?>
