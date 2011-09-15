<?php
/**
 * Pintsize
 *
 * Go controller
 */

try {

    $api = new API();
    $result = $api->getShortcode(Input::shortcode());

    if ($result['url']) {
        header("Location: {$result['url']}", 301);
    
    } else {
        $view = new View();
        $view->add('common/header');
        $view->add('error/404');
        $view->add('common/footer');
        $view->render();
    }

} catch (Exception $e) {
    header("Location: http://pintsize.orchestra.io", 301);
    exit;
}

?>
