<?php

include 'php/Parsedown.php';

$parsedown = new Parsedown();

$pages = [
    'Introduzione' => 'introduzione',
    'Musica' => 'musica',
    'Codice' => 'codice',
    'Università' => 'universita'
];

# Get the requested page name.
if (empty($_GET['page'])) {
    $page_id = DEFAULT_PAGE;
} else {
    $page_id = $_GET['page'];
}

$fn = fopen("pages/$page_id.md", 'r');

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

?>
