<?php
/**
 * Pintsize
 *
 * Start controller
 */

$view = new View();

$view->add('common/header')->import(array(
    'title' => "Will you have a small one?"
));

$view->add('start/start');

$view->add('common/footer');

$view->render();

?>
