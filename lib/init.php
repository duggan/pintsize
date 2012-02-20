<?php
/**
 * Pintsize
 *
 * Initialization.
 */

/* Define the few global constants we want */
date_default_timezone_set('Europe/Dublin');

// Enable/disable application local debugging - populates Log::getDebug()
define("APP_LOCAL_DEBUGGING",   TRUE);

/*  Autoloader
 *
 *  @param $name   Case sensitive class name.
 *  @return         NULL on success, throws an exception on failure.
 *
 */
function pintsize_autoloader($name) {

    $path = dirname(__FILE__) . '/class/' . $name . '.php';
    if (file_exists($path)) {
        require $path;
    } else {
        throw new Exception("Class '$name' could not be found!", 500);
    }
}

// Register autoloader on stack
spl_autoload_register('pintsize_autoloader');


?>
