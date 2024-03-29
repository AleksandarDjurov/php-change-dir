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
    $dirs = array();
    $new_dirs = explode('/', $new_path);
    $dirs = explode('/', $this->current_path);
    $first_index = strstr($new_path, '/');
    $first_pos = strpos($new_path, '/');

    if ($first_index && $first_pos === 0) {
      $new_dirs = explode('/', $new_path);
      $dirs = array();
    }

    foreach ($new_dirs as $new_dir) {
      if ($new_dir === '..') {
        array_pop($dirs);
      } else if ($new_dir === '.') {
        //
      } else {
        array_push($dirs, $new_dir);
      }
    }

    return implode('/', $dirs);
  }
}

$path = new Path('/a/b/c/d');

$changed_path = $path->cd('../x');
echo $changed_path . PHP_EOL;

$changed_path = $path->cd('./x');
echo $changed_path . PHP_EOL;

$changed_path = $path->cd('x');
echo $changed_path . PHP_EOL;

$changed_path = $path->cd('/a');
echo $changed_path . PHP_EOL;

$changed_path = $path->cd('../../e/../f');
echo $changed_path . PHP_EOL;

$changed_path = $path->cd('/d/e/../a');
echo $changed_path . PHP_EOL;

?>