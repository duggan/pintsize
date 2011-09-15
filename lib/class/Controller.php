<?php
/**
 * Pintsize
 *
 * Spartan controller loader
 */

class Controller
{
    public function __construct($name)
    {
        if (preg_match('/[a-z0-9_\-]{1,256}/i', $name)) {

            $path = dirname(dirname(dirname(__FILE__))) . '/controller/' . strtolower($name) . '.php';

            if (file_exists($path)) {
                include $path;
            } else {
                throw new Exception("Controller '$name' not found", 500);
            }
        }
    }
}

?>
