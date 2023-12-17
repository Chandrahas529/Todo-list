<?php
$id = $_POST["id"];
$title = $_POST["title"];
$Desc = $_POST["desc"];
// read file
$data = file_get_contents('Data.json');

// decode json to array
$json_arr = json_decode($data, true);

foreach ($json_arr as $key => $value) {
    if ($value['id'] == $id) {
        $json_arr[$key]['name'] = $title;
        $json_arr[$key]['class'] = $Desc;
    }
}

// encode array to json and save to file
file_put_contents('Data.json', json_encode($json_arr));
?>