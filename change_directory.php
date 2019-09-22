<?php
class Path
{
  public $current_path;
  public $glob_count;

  function __construct($path) {
    $this->current_path = $path;
    $this->glob_count = 0;
  }

  public function cd($new_path , &$change_path) {
    $dirs = explode('/', $this->current_path);
    $new_dirs = explode('/', $new_path);
    $first_index = strstr($new_path, '/');
    $first_pos = strpos($new_path, '/');

    if ($first_index && $first_pos === 0) {
      $change_path = $new_path;
    } else {
      $new_path = [];
      foreach ($new_dirs as $new_dir) {
        if ($new_dir === '..') {
          array_pop($dirs);
        } else if ($new_dir === '.') {
          // slience is gold
        } else {
          $second_dirs = $dirs;
          array_push($second_dirs, $new_dir);
          $dirs = $second_dirs;
          $conv_path = implode('/', $second_dirs);

          $this->cd($conv_path, $change_path);
          $new_path[] = $new_dir;
        }
      }
      $new_path = array_merge($dirs, $new_path);
    }
  }
}

$path = new Path('/a/b/c/d');
$change_path = '';
$path->cd('../x', $change_path);
echo $change_path . PHP_EOL;

$path->cd('./x', $change_path);
echo $change_path . PHP_EOL;

$path->cd('x', $change_path);
echo $change_path . PHP_EOL;

$path->cd('/a', $change_path);
echo $change_path . PHP_EOL;

$path->cd('../../e/../f', $change_path);
echo $change_path . PHP_EOL;
