<?php
/**
 * Pintsize
 *
 * Configuration class.
 * Makes use of __callStatic to dynamically load JSON configuration files.
 */

class Config
{
    protected static $config    = array();
    protected static $dir       = '/config/';
    protected static $extension = '.json';

    /* Where the magic happens
     *
     * @param $name     The config name to retrieve, must conform to the 
     *                  regex pattern: /[a-z0-9_-]{1,256}/i
     */
    public static function __callStatic($name, $arguments)
    {
        $config = dirname(dirname(dirname(__FILE__)))
                . self::$dir
                . self::sanitize($name)
                . self::$extension;

        if (!empty($arguments)) {
            
            if (file_put_contents(
                $config, 
                json_encode($arguments)
            )) {
                return TRUE;
            }

            return FALSE;

        } else {
            if (file_exists($config)) {
                return json_decode(file_get_contents($config), TRUE);
            }
            throw new Exception("No config file found at $config", 500);
        }
    }

    /*  Sanitization
     *
     *  Ensure config filename matches a safe series of characters.
     *
     *  @param $name    Requested config name.
     *  @return         Returns $name unmolested if safe,
     *                  throws an exception otherwise.
     */
    protected function sanitize($name)
    {
        $name = strtolower($name);
        if (preg_match('/[a-z0-9_-]{1,256}/i', $name)) {
            return $name;
        } else {
            throw new Exception("Config name '$name' is not allowed.", 400);
        }
    }
}
?>
