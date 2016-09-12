<?php
require_once('setting.php');
$link = new mysqli(DB_HOST,DB_USER,DB_PASS);
if ($link->connect_error) 
    { 
        echo "Error".$link->connect_error;
    }
else
    {
        echo "connected";
        
    }
 
?>