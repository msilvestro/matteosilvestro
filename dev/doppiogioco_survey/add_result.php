<?php
$error = FALSE;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['result'])) {
    $result = $_POST['result'];
    # add the result (formatted as JSON) to the file of all results
    $out = file_put_contents('results.json', $result . ",\n", FILE_APPEND);
    if (!$out) $error = TRUE;
} else {
    $error = TRUE;
}

if ($error) {
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
}
?>
