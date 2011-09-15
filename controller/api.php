<?php
/**
 * Pintsize
 *
 */

if (Input::shortcode()) {
    try {

        $api = new API();
        $result = $api->getShortcode(Input::shortcode());

        // Check to see if exists in DB
        echo json_encode(array('result' => $result));

    } catch (Exception $e) {
        echo json_encode(array('failure' => $e->getMessage()));
    }
} else {

    $view = new View();
    $view->add('common/header')->import(array('title' => 'API Help'));
    $view->add('help/api');
    $view->add('common/footer');
    $view->render();
}
?>
