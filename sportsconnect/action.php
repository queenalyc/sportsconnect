<?php
// Title: Product Filter Search with Ajax, PHP & MySQL
// Author: PHPZAG Team
// Date: 4 December, 2019
// Code Version: 1.0
// Availability: https://www.phpzag.com/product-filter-search-with-ajax-php-mysql/
session_start();
include 'class/Classes.php';
$classes = new Classes();
if(isset($_POST["action"])){
    $html = $classes->searchClass($_POST);
    $data = array(
        "html"=> $html,
    );
    echo json_encode($data);
}
?>