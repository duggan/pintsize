<?php
/**
 * Pintsize
 *
 */

try {

    $api = new API();
    $result = $api->getShortcode(Input::shortcode());

    // Check to see if exists in DB
    echo json_encode(array('result' => $result));

} catch (Exception $e) {
    echo json_encode(array('failure' => $e->getMessage()));
}

?>
