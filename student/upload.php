<?php

function getFileUpload(string $fileName)
{
    if (isset($_FILES[$fileName])) {
        move_uploaded_file($_FILES[$fileName]['tmp_name'], "uploads/".$_FILES[$fileName]['full_path']);
        return $_FILES[$fileName]['name'];
    }
    return null;
}

