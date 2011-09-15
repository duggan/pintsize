<?php
/**
 * Pintsize
 *
 * Basic user input checking
 */

class Input
{
    const pattern = '/[a-z0-9]{1,256}/i';
    /*  URL
     *  
     *  @return Sanitized URL
     */
    public static function url()
    {
        if (isset($_REQUEST['url']) && filter_var(trim($_REQUEST['url']), FILTER_VALIDATE_URL)) {
            return filter_var(trim($_REQUEST['url']), FILTER_SANITIZE_URL);
        }
    }

    /* Custom
     *
     * @return string   Custom URL value being requested
     */
    public static function custom()
    {
        if (isset($_REQUEST['custom']) && preg_match(self::pattern, $_REQUEST['custom'])) {
            return $_REQUEST['custom'];
        }
    }

    /* Shortcode
     *
     * @return string   Return a shortcode if it's valid
     */
    public static function shortcode()
    {
        if (isset($_REQUEST['shortcode']) && preg_match(self::pattern, $_REQUEST['shortcode'])) {
            return $_REQUEST['shortcode'];
        }
    }

    /* Latitude
     *
     */
    public static function latitude()
    {
        if (isset($_REQUEST['latitude']) && filter_var($_REQUEST['latitude'], FILTER_VALIDATE_FLOAT)) {
            return $_REQUEST['latitude'];
        }
    }

    /* Longitude
     *
     */
    public static function longitude()
    {
        if (isset($_REQUEST['longitude']) && filter_var($_REQUEST['longitude'], FILTER_VALIDATE_FLOAT)) {
            return $_REQUEST['longitude'];
        }
    }
}
?>
