<?php
define('DEFAULT_PAGE', 'introduzione');

include 'php/Pagemaker.php';
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

            <div id="title"><h1>La pagina di Matteo Silvestro</h1></div>

            <div id="menu">
                <ul>
                    <?php foreach ($pages as $menu_page_title => $menu_page_id): ?>
                        <?php if ($menu_page_title == $page_title): ?>
                            <li><?= $menu_page_title ?></li>
                        <?php else: ?>
                            <li><a href="<?= $menu_page_id ?>"><?= $menu_page_title ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>

            <h2><?= $page_title ?></h2>

            <?php foreach ($cards as $card): ?>
            <div class="card" id="<?= slugify($card['title']) ?>">

                <div class="right column">
                    <div class="title"><h3><?= $card['title'] ?></h3></div>
                    <?= $parsedown->text($card['right_column']) ?>
                </div>
                <div class="left column">
                    <?= render_video_tags($parsedown->text($card['left_column'])) ?>
                </div>
            </div>
            <?php endforeach; ?>

            <div id="footer">Matteo Silvestro 2020 - Version <abbr title="teta">&theta;</abbr> - Stile <a href="cappuccino.css">Cappuccino</a></div>

        </div>

    </body>

</html>
