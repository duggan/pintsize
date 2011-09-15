<?php
/**
 * Pintsize
 *
 * Router.
 */

// Initialize
require dirname(dirname(__FILE__)) . '/lib/init.php';

$router = new Router();
$route  = $router->get() ?: array('start');

// Invoke a controller
switch ($route[0]) {

    case 'go':
    case 'start':
    case 'create':
    case 'delete':
    case 'stats':
    case 'api':
        try {
            $controller = new Controller($route[0]);
        } catch (Exception $e) {
            Log::warning($e->getMessage());
        }
        break;
    default:
        $view = new View();
        $view->add('common/header');
        $view->add('error/404');
        $view->add('common/footer');
        $view->render();

}

?>
