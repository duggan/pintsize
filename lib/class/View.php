<?php
/**
 * Pintsize
 *
 */

class View
{
    protected $templates    = array();
    protected $imports      = array();
    protected $current      = 0;

    public function __construct()
    {
    }

    public function add($view)
    {
        $path = dirname(dirname(dirname(__FILE__))) . '/view/' . $view . '.php';
        
        if (file_exists($path)) {
            
            $this->templates[++$this->current] = $path;
            
            return $this;
        }
        throw new Exception("No template found at $path", 500);
    }

    public function import(array $data)
    {
        if (!$this->current) {
            throw new Exception("A template must be added before you can import data to it!", 400);
        }

        $this->imports[$this->current] = $data;
        
    }

    public function render()
    {
        foreach ($this->templates as $key => $path) {
            if (isset($this->imports[$key])) {
                $import = $this->imports[$key];
            }
            include $path;
        }
    }
}
?>
