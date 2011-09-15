<?php
/**
 * Pintsize
 *
 */

class API
{
    private $collection;

    public function __construct()
    {
        $config = Config::mongo();
        $mongo = new Mongo($config['connection_url']);
        $this->collection = $mongo->$config['database']->$config['collection'];
    }

    public function getShortcode($code)
    {
        $item = $this->collection->findOne(array('shortcode' => $code));

        return $item;
    }

    public function findAvailable()
    {
        $random = base_convert(mt_rand(), 10, 36);
        if (!$this->getShortcode($random)) {
            return $random;
        } else {
            Log::warning("Going for another trip...");
            return $this->findAvailable();
        }
    }

    public function addUrl($url, $custom = NULL, array $latlong)
    {
        if ($custom) {
            $item = $this->getShortcode($custom);
            if ($item) {
                return FALSE;
            } else {
                $code = $custom;
            }
        } else {
            $code = $this->findAvailable();
        }

        $obj = array(
            "url" => $url,
            "shortcode" => $code,
        );

        if (!empty($latlong)) {
            $obj['loc'] = array(
                'x' => $latlong['lat'],
                'y' => $latlong['long']
            );
        }

        $this->collection->insert($obj, array("safe" => true));

        return $obj;
    }
}
?>
