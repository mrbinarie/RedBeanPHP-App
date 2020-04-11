<?php

define("HAS_ACCESS", true);

require '../rb.php';

include_once "../env.php";
include_once "../controllers/AjaxController.php";


$file = (isset($_GET['p']) && !empty($_GET['p'])) ? $_GET['p'] : 'none';


if($file == 'none' || !file_exists("{$file}.php")){
    echo json_encode(['error' => 'ajax file not found']);
} else {
    session_start();
    include_once "{$file}.php";
}