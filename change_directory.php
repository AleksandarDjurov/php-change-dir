<?php
class Path
{
    public $current_path;

    function __construct($path)
    {
        $this->current_path = $path;
    }

    public function cd($new_path)
    {

    }
}

$path = new Path('/a/b/c/d');
$path->cd('../x');
echo $path->current_path;
