<?php
/**
 * Pintsize
 *
 */

try {

    if (!Input::url()) {
        throw new Exception("Not a valid URL", 400);
    }

    $latlong = array();
    if (Input::latitude() && Input::longitude()) {
        $latlong = array('lat' => Input::latitude(), 'long' => Input::longitude());
    }

    $api = new API();
    $result = $api->addUrl(Input::url(), Input::custom(), $latlong);

    if (Input::custom() && !$result) {
        $suggestions = array();
        for ($i=0;$i<3;$i++) {
            $suggestions[] = Input::custom() . '_' . mt_rand(1,300);
        }
        echo json_encode(array('retry' => '"'.Input::custom().'" is already taken, maybe try another? (' . join(', ', $suggestions) . ')' ));
    } else {
        echo json_encode(array('success' => $result));
    }

} catch (Exception $e) {
    echo json_encode(array('failure' => $e->getMessage()));
}


?>
