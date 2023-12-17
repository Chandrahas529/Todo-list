<?php
    
        $id = file_get_contents('Data.json');
        $json_arr = json_decode($id, true);
        $key = [];
        for($i = 0;$i<count($json_arr); $i++)
        {
            $key[$i] = $json_arr[$i]["id"];
        }
        $nextId = max($key);
        $id = ++$nextId;
        //echo $id;
        //array_search(max($json_arr["id"]), $json_arr["id"]);
        $new_message = array(
            "id" => $id,
            "name" => $_POST["name"],
            "class" => $_POST["room"]
           
            //"age" => $_POST["age"]
        );
        if(filesize("Data.json") == 0){
            $first_record = array($new_message);
            $data_to_save = $first_record;
        }
        else{
            $old_record = json_decode(file_get_contents("Data.json"));
            //echo $old_record;
            array_push($old_record,$new_message);
            $data_to_save = $old_record;            
        }
        if(!file_put_contents("Data.json",json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)){
            $error = "error";
        }
        else{
            $success = "Stored";
        }
    ?>		