<?php
define("DEFAULT_LANGUAGE", "en");
$SUPPORTED_LANGUAGES = ["it", "en"];
define("DEFAULT_PAGE", "home");
define("LAST_UPDATE", "10/09/2019");
define("VERSION", "zeta");

include 'lib/Parsedown.php';
include 'lib/ParsedownExtra.php';
include 'lib/helper.php';

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

# URL of the same page but in another language
# i.e. the page "thesis" (en) becomes "tesi" (it)
$foreign_page_url = "";

# get the menu
if (file_exists("pages/pages.json")) {
    $pages_json = file_get_contents("pages/pages.json", "r");
} else {
    $pages_json = false;
}
if ($pages_json) {
    $pages_array = json_decode($pages_json, true);
    $menu_html = '<div id="menu">
<h2 class="hidden">Menu</h2>
{ <ul> ';
    foreach ($pages_array as $id=>$details) {
        $url = $details[$lang]["url"];
        if ($url == ".") {
            $short_name = DEFAULT_PAGE;
        } else {
            $short_name = $url;
        }
        $full_name = htmlspecialchars($details[$lang]["full_name"], ENT_COMPAT, 'UTF-8');
        if ($short_name == $page_name) {
            # the active page must be shown normal
            $menu_html .= "<li>/$short_name</li> ";
            # set the other language URL
            $other_lang = get_other_language($lang);
            if (isset($details[$other_lang])) {
                $foreign_page_url = $details[$other_lang]["url"];
            } else {
                $foreign_page_url = "";
            }
        } else {
            # if the page is not in the default language (e.g. it), all pages
            # are in /it/, so add it to url
            if ($lang == DEFAULT_LANGUAGE) {
                $lang_prefix = "";
            } else {
                $lang_prefix = "$lang/";
            }
            # all non active pages are shown as links
            $menu_html .= "<li>/<a href=\"/$lang_prefix$url\" target=\"_self\"><abbr title=\"$full_name\">$short_name</abbr></a></li> ";
        }
    }
    $menu_html .= "</ul> }
</div>";
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
<!DOCTYPE html>
<!--
Matteo Silvestro's page / La pagina di Matteo Silvestro
version epsilon
by Matteo Silvestro
CC BY 4.0
http://creativecommons.org/licenses/by/4.0/
last update: <?php echo LAST_UPDATE; ?>

-->
<html lang="<?php echo $lang; ?>">
<head>

<title><?php echo $page_title; ?></title>

<meta name="description" content="<?php echo $page_description; ?>">
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

<?php if (isset($menu_html)): ?>
<?php echo $menu_html; ?>

<hr />
<?php endif; ?>

<?php echo $page_html; ?>

<hr />

<!-- piè pagina -->
<div id="footer">

<?php if ($lang == "it"): ?>
Matteo Silvestro <abbr title="Ultimo aggiornamento: <?php echo LAST_UPDATE; ?>">2019</abbr> - Stile <abbr title="Lo stile Espresso è basato su puro testo, con caratteri ben visibili e qualche formattazione. Quindi, è facilmente interpretabile da tutti i browser, via cellulare o PC, e facilmente leggibile da tutte le persone. La pagina è perfetta anche senza CSS.">Espresso*</abbr> - Versione <abbr title="<?php echo VERSION; ?>">&<?php echo VERSION; ?>;</abbr> - <a href="/<?php echo $foreign_page_url; ?>" target="_self" lang="en">english version</a>
<?php else: ?>
Matteo Silvestro <abbr title="Last update: <?php echo LAST_UPDATE; ?>">2019</abbr> - <abbr title="Espresso style is based off pure text, with well-visible fonts and a few formatting. So, it is easily interpretable by all browsers, mobile phones or computer, and easily readable by everybody. The page is perfect even without CSS.">Espresso*</abbr> style - Version <abbr title="<?php echo VERSION; ?>">&<?php echo VERSION; ?>;</abbr> - <a href="/it/<?php echo $foreign_page_url; ?>" target="_self" lang="it">versione italiana</a>
<?php endif; ?>

</div>

</div>

</body>
