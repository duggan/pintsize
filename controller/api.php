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
} else if (Input::latitude() && Input::longitude()) {
    try {
        $api = new API();
        $result = $api->getNear(array('lat' => Input::latitude(), 'long' => Input::longitude()));

        echo json_encode(array('result' => $result));

    } catch (Exception $e) {
        echo json_encode(array('failure' => $e->getMessage()));
    }
} else {

    $view = new View();
    $view->add('help/header')->import(array('title' => 'API Help'));
    $view->add('help/api');
    $view->add('common/footer');
    $view->render();
}
?>
