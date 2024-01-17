<?php

function getFileUpload($fileName)
{
// var_dump($fileName); die;
    if (is_array($fileName)){
        move_uploaded_file($fileName['tmp_name'], "./student/uploads/".$fileName['full_path']);
        return $fileName['full_path'];
    }
    return $fileName;
}

