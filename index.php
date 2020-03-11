<?php
include 'php/Pagemaker.php';

define('DEFAULT_PAGE', 'introduction');
define('DEFAULT_LANGUAGE', 'en');
define('OTHER_LANGUAGE', 'it');

$pages = array(
    'en' => array(
        'introduction' => 'Introduction',
        'music' => 'Music',
        'code' => 'Code',
        'university' => 'University'
    ),
    'it' => array(
        'introduction' => 'Introduzione',
        'music' => 'Musica',
        'code' => 'Codice',
        'university' => 'Università'
    )
);

list($page_title, $page_lang, $cards) = get_cards($pages);
?>
<!DOCTYPE html>
<html lang="it">

    <head>

        <meta charset="UTF-8">
        <meta name="description" content="Descrizione">
        <meta name="author" content="Matteo Silvestro">
        <meta name="generator" content="Visual Studio Code 1.42.1">

        <link rel="stylesheet" type="text/css" href="/cappuccino.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="favicon.ico" />

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/animate.js"></script>

    </head>

    <body>

        <div id="layout">

            <div id="title"><h1>
                <?php if ($page_lang == "en"): ?>
                    Matteo Silvestro<span class="dim">'s page</span></h1>
                <?php else: ?>
                    <span class="dim">La pagina di</span> Matteo Silvestro</h1>
                <?php endif; ?>
            </div>

            <div id="menu">
                <ul>
                    <?php foreach ($pages[$page_lang] as $menu_page_id => $menu_page_title): ?>
                        <?php if ($menu_page_title == $page_title): ?>
                            <li><?= $menu_page_title ?></li>
                        <?php elseif ($menu_page_title == $pages[$page_lang][DEFAULT_PAGE]): ?>
                            <li><a href="<?= get_prefix($page_lang) ?>"><?= $menu_page_title ?></a></li>
                        <?php else: ?>
                            <li><a href="<?= get_prefix($page_lang).slugify($menu_page_title) ?>"><?= $menu_page_title ?></a></li>
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

            <?php if ($page_lang == "en"): ?>
                <div id="footer">Matteo Silvestro 2020 - Versione <abbr title="theta">&theta;</abbr> - Stile <a href="cappuccino.css">Cappuccino</a> - Sorgente <a href="<?= get_markdown_source($page_title, $page_lang) ?>">Markdown</a> - <a href="<?= get_translation($pages, $page_title, $page_lang) ?>">English</a> version</div>
            <?php else: ?>
                <div id="footer">Matteo Silvestro 2020 - Version <abbr title="theta">&theta;</abbr> - <a href="cappuccino.css">Cappuccino</a> style - <a href="<?= get_markdown_source($page_title, $page_lang) ?>">Markdown</a> source - Versione <a href="<?= get_translation($pages, $page_title, $page_lang) ?>">italiana</a></div>
            <?php endif; ?>

        </div>

    </body>

</html>
