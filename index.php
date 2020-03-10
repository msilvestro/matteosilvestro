<?php
include 'php/Parsedown.php';

$parsedown = new Parsedown();

$pages = [
    'Introduzione' => 'introduzione',
    'Musica' => 'musica',
    'Codice' => 'codice',
    'Università' => 'universita'
];

$fn = fopen('pages/musica.md', 'r');

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
?>
<!DOCTYPE html>
<html lang="it">

    <head>

        <meta charset="UTF-8">
        <meta name="description" content="Descrizione">
        <meta name="author" content="Matteo Silvestro">
        <meta name="generator" content="Visual Studio Code 1.42.1">

        <link rel="stylesheet" type="text/css" href="cappuccino.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script type="text/javascript" src="js/animate.js"></script>

    </head>

    <body>

        <div id="layout">

            <div id="menu">
                <ul>
                <?php foreach ($pages as $page_name => $page_link): ?>
                    <?php if ($page_name == $page_title): ?>
                    <li><?= $page_name ?></li>
                    <?php else: ?>
                    <li><a href="<?= $page_link ?>"><?= $page_name ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
            </div>

            <h2><?= $page_title ?></h2>

            <?php foreach ($cards as $card): ?>
            <div class="card" id="la-mia-persona">

                <div class="right column">
                    <div class="title"><h3><?= $card['title'] ?></h3></div>
                    <?= $parsedown->text($card['right_column']) ?>
                </div>
                <div class="left column">
                    <?= $parsedown->text($card['left_column']) ?>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </body>

</html>
