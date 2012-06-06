<?php
/**
 * Pintsize
 *
 */

sleep(2);

$view = new View();

$view->add('common/header')->import(array("title" => "Sleepy..."));
$view->add('sleep/sleep');
$view->add('common/footer');

$view->render();
?>
