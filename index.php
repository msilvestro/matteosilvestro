<?php
include 'php/Pagemaker.php';

define('DEFAULT_PAGE_ID', 'introduction');
define('DEFAULT_LANGUAGE', 'en');
define('SECOND_LANGUAGE', 'it');

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

$page = new Pagemaker($pages);
?>
<!DOCTYPE html>
<html lang="<?= $page->lang ?>">

    <head>

        <title><?= $page->get_webpage_title() ?></title>

        <meta charset="UTF-8">
        <meta name="description" content="<?= $page->description ?>">
        <meta name="author" content="Matteo Silvestro">
        <meta name="generator" content="Visual Studio Code 1.42.1">

        <link rel="stylesheet" type="text/css" href="/cappuccino.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <script type="text/javascript" src="/js/jquery.js"></script>
        <script type="text/javascript" src="/js/animate.js"></script>

    </head>

    <body>

        <div id="layout">

            <div id="title"><h1>
                <?php if ($page->lang == "en"): ?>
                    Matteo Silvestro<span class="dim">'s page</span></h1>
                <?php else: ?>
                    <span class="dim">La pagina di</span> Matteo Silvestro</h1>
                <?php endif; ?>
            </div>

            <div id="menu">
                <ul>
                    <?php foreach ($page->get_menu() as $menu_page_id => $menu_page_title): ?>
                        <?php if ($menu_page_title == $page->title): ?>
                            <li><?= $menu_page_title ?></li>
                        <?php elseif ($menu_page_title == $page->get_default_page()): ?>
                            <li><a href="<?= $page->get_lang_prefix() ?>"><?= $menu_page_title ?></a></li>
                        <?php else: ?>
                            <li><a href="<?= $page->get_lang_prefix().$page->get_url($menu_page_title) ?>"><?= $menu_page_title ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>

            <h2><?= $page->title ?></h2>

            <?php foreach ($page->cards as $card): ?>
            <div class="card" id="<?= $page->get_url($card['title']) ?>">

                <div class="right column">
                    <div class="title">
                        <h3><?= $card['title'] ?></h3>
                        <?php if (isset($card['date'])): ?>
                            <span class="dim"><?= $card['date'] ?></span>
                        <?php endif; ?>
                    </div>
                    <?= $page->render_markdown($card, 'right_column') ?>
                </div>
                <div class="left column">
                    <?= $page->render_markdown($card, 'left_column') ?>
                </div>
            </div>
            <?php endforeach; ?>

            <?php if ($page->lang == "en"): ?>
                <div id="footer">Matteo Silvestro 2020 — Version <abbr title="theta">&theta;</abbr> — <a href="cappuccino.css">Cappuccino</a> style — <a href="<?= $page->get_markdown_source() ?>">Markdown</a> source — Versione <a href="<?= $page->get_translated_page() ?>">italiana</a></div>
            <?php else: ?>
                <div id="footer">Matteo Silvestro 2020 — Versione <abbr title="theta">&theta;</abbr> — Stile <a href="cappuccino.css">Cappuccino</a> — Sorgente <a href="<?= $page->get_markdown_source() ?>">Markdown</a> — <a href="<?= $page->get_translated_page() ?>">English</a> version</div>
            <?php endif; ?>

        </div>

    </body>

</html>
