<?php
# the list of main characters appearing throughout the whole story
$all_characters = array(
    "Vera",
    "James",
    "Earnest",
    "Edward",
    "Barbara",
    "Jennifer",
    "Amanda",
    "Leo",
    "Debra",
    "Lawrence",
    "Arthur"
);

if (isset($_GET['unit'])) {
    # if a unit is specified, show only the characters appearing in the unit
    $req_unit = $_GET['unit'];

    # extract all unit texts and select the one corresponding to the given unit
    $texts = array();
    if (($handle = fopen('unit_texts.csv', 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if (array(null) !== $data) {
                $unit = $data[0];
                $text = nl2br(htmlspecialchars($data[1]));
                $text = str_replace(array("\r", "\n"), '', $text);
                $texts[$unit] = $text;
            }
        }
        fclose($handle);
    }
    $unit_text = $texts[$req_unit];

    # for each character, check if his/her name appears in the unit text
    # if so, add it to the list of filtered characters
    $filtered_characters = array();
    foreach ($all_characters as $char) {
        if (strpos($unit_text, $char) !== false) {
            array_push($filtered_characters, $char);
        }
    }

    $characters = $filtered_characters;
} else {
    # if no unit is given, return the list of all characters
    $characters = $all_characters;
}
# shuffle the character order to avoid a bias in the selection
shuffle($characters);
echo json_encode($characters);
?>
