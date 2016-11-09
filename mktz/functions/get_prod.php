<?php

require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

$product = new WC_Product($_POST['id']);

$pURL = get_permalink($product->id);
$pTitle = $product->get_title();
$pID = $product->id;

$return = array(
    'id' => $pID,
    'title' => $pTitle,
    'URL' => $pURL
);

$jReturn = json_encode($return);

echo $jReturn;