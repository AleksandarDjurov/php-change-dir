<?php
class Path
{
  public $current_path;

  function __construct($path) {
    $this->current_path = $path;
  }

  public function cd($newPath) {
    $innerCounter = 0;
    $strOut= '';
    $newPath = explode('/', $newPath);
    $oldPath = explode('/', $this->current_path);

    foreach ($newPath as $str) {
      if ($str == '..') $innerCounter++;
    }

    $oldLength = count($oldPath);
    for ($i = 0; $i < $oldLength - $innerCounter; $i++) {
      $strOut .= $oldPath[$i] . '/';
    }

    $newLength = count($newPath);
    for ($i = 0; $i < $newLength; $i++) {
      if ($newPath[$i] != '..') {
        $strOut = $strOut . $newPath[$i] . '';
      }
    }

    $this->current_path = $strOut;
    return $this;
  }
}

$path = new Path('/a/b/c/d');
$argInput = '/d/e/../a';

echo "/a/b/c/d\n";
echo "TEST: " . $argInput . "\n";
$path->cd($argInput);
echo $path->current_path . "\n";
