<?php

define("HAS_ACCESS", true);

// require 'rb.php';

include_once 'env.php';
include_once 'controllers/PagesController.php';

$PagesController = new PagesController();

$PagesController->load();
    
?>
