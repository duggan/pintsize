<?php
/**
 * Pintsize
 *
 * Logging class for Orchestra.io deployment.
 * Debugs locally to application, errors/warnings/notices go to PHP error log when live.
 * Plays a little fast and loose with debug storage, so be careful.
 */

class Log
{
    private static $debug = array();

    public static function debug($message)
    {
        return self::doLog("APP_USER_DEBUG", $message);
    }
    
    public static function error($message)
    {
        return self::doLog(E_USER_ERROR, $message);
    }
    
    public static function warning($message)
    {
        return self::doLog(E_USER_WARNING, $message);
    }

    public static function notice($message)
    {
        return self::doLog(E_USER_NOTICE, $message);
    }

    public static function doLog($priority, $message)
    {
        $app_local_debugging = FALSE;

        if (defined("APP_LOCAL_DEBUGGING") && APP_LOCAL_DEBUGGING === TRUE) {
            $app_local_debugging = TRUE;
        }

        switch ($priority) {
        case "APP_USER_DEBUG":
            if ($app_local_debugging === TRUE) {
                self::$debug[] = sprintf("%s: [DEBUG] - %s", strftime('%c', time()) , $message);
            }
            return;
        case E_USER_ERROR:
            if ($app_local_debugging === TRUE) {
                self::$debug[] = sprintf("%s: [ERROR] - %s", strftime('%c', time()) , $message);
            }
            return trigger_error($message, $priority);
        case E_USER_WARNING:
            if ($app_local_debugging === TRUE) {
                self::$debug[] = sprintf("%s: [WARNING] - %s", strftime('%c', time()) , $message);
            }
            return trigger_error($message, $priority);
        case E_USER_NOTICE:
            if ($app_local_debugging === TRUE) {
                self::$debug[] = sprintf("%s: [NOTICE] - %s", strftime('%c', time()) , $message);
            }
            return trigger_error($message, $priority);
        }

    }

    public static function getDebug()
    {
        return self::$debug;
    }
}
?>
