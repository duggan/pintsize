<?php
/**
 * Pintsize
 *
 */

class Router
{
    protected $get;

    public function get()
    {
        if (!isset($this->get)) {
            $this->get = $_GET;
        }

        if (isset($this->get['r']))  {

            $check = explode('/', $this->get['r']);
            foreach ($check as $segment) {
                if (preg_match('/[a-z0-9_\-]{1,256}/', $segment)) {
                    $clean[] = $segment;
                }
            }
            return $clean;
        }
    }
}
?>
