<?php
define("DEFAULT_LANGUAGE", "en");
$SUPPORTED_LANGUAGES = ["it", "en"];
define("DEFAULT_PAGE", "home");
define("LAST_UPDATE", "05/03/2020");
define("VERSION", "eta");

include 'lib/PageMaker.php';
?>
<!--
Matteo Silvestro's page / La pagina di Matteo Silvestro
version <?= VERSION ?>
by Matteo Silvestro
CC BY 4.0
http://creativecommons.org/licenses/by/4.0/
last update: <?= LAST_UPDATE ?>

-->
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>

<title><?= $page_title ?></title>

<meta name="description" content="<?= $page_description ?>">
<meta name="author" content="Matteo Silvestro">
<meta name="generator" content="Visual Studio Code">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">

<!-- favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#569cd6">
<meta name="msapplication-TileColor" content="#2d89ef">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" type="text/css" href="/espresso.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<!-- for mobile phones -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<?php include_once("lib/analyticstracking.php"); ?>

<div id="layout">

<!-- menu -->
<?php if ($menu): ?>
<div id="menu">
<h2 class="hidden">Menu</h2>
{ <ul>
<?php foreach($menu[$lang] as $short_name=>$description): ?>
<?php if ($short_name == $page_name): ?>
<li>/<?= $short_name ?></li>
<?php else: ?>
<li>/<a href="/<?= $short_name == DEFAULT_PAGE ? $lang_prefix : $lang_prefix.$short_name ?>" target="_self"><abbr title="<?= $description ?>"><?= $short_name ?></abbr></a></li>
<?php endif; ?>
<?php endforeach; ?>
</ul> }
</div>

<hr />
<?php endif; ?>

<!-- page -->
<?= $page_html ?>

<hr />

<!-- footer -->
<div id="footer">

<?php if ($lang == "it"): ?>
Matteo Silvestro <abbr title="Ultimo aggiornamento: <?= LAST_UPDATE ?>"><?= $last_update_year ?></abbr> - Versione <abbr title="<?= VERSION ?>">&<?= VERSION ?>;</abbr> - Stile <a href="/espresso.css"><abbr title="Lo stile Espresso è basato su puro testo, con caratteri ben visibili e qualche formattazione. Quindi, è facilmente interpretabile da tutti i browser, via cellulare o PC, e facilmente leggibile da tutte le persone. La pagina è perfetta anche senza CSS.">Espresso</abbr></a> - <a href="/pages/it/<?= $page_name ?>.md"><abbr title="Visualizza il codice sorgente della pagina">md</abbr></a> - <a href="/<?= $foreign_page_url; ?>" target="_self" lang="en">english version</a>
<?php else: ?>
Matteo Silvestro <abbr title="Last update: <?= LAST_UPDATE ?>"><?= $last_update_year ?></abbr> - Version <abbr title="<?= VERSION ?>">&<?= VERSION ?>;</abbr> - <a href="/espresso.css"><abbr title="Espresso style is based off pure text, with well-visible fonts and a few formatting. So, it is easily interpretable by all browsers, mobile phones or computer, and easily readable by everybody. The page is perfect even without CSS.">Espresso</abbr></a> style - <a href="/pages/en/<?= $page_name ?>.md"><abbr title="Show the source code of the page">md</abbr></a> - <a href="/it/<?php echo $foreign_page_url; ?>" target="_self" lang="it">versione italiana</a>
<?php endif; ?>

</div>

</div>

</body>
