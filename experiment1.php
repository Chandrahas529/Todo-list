<?php
    
    if(isset($_POST["submit"])){
        $new_message = array(
            "name" => $_POST["name"],
            "class" => $_POST["class"],
            "age" => $_POST["age"]
        );
        
        if(filesize("Js.json") == 0){
            $first_record = array($new_message);
            $data_to_save = $first_record;
        }
        else{
            $old_record = json_decode(file_get_contents("Js.json"));
            echo $old_record;
            array_push($old_record,$new_message);
            $data_to_save = $old_record;            
        }
        if(!file_put_contents("Js.json",json_encode($data_to_save, JSON_PRETTY_PRINT), LOCK_EX)){
            $error = "error";
        }
        else{
            $success = "Stored";
        }
    }
    echo"<META HTTP-EQUIV='REFRESH' CONTENT='0; URL = http://localhost/Sender/.html'>";
    ?>		