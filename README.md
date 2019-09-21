# php-change-dir
Write a function that provides change directory (cd) function for an abstract file system

## Notes:
```
Root path is '/'.
Path separator is '/'.
Parent directory is addressable as '..'.
Directory names consist only of English alphabet letters (A-Z and a-z).
The function will not be passed any invalid paths.
Do not use built-in path-related functions.
```

## For example:
```php
$path = new Path('/a/b/c/d');

$path->cd('../x');
echo $path->currentPath;
# should display '/a/b/c/x'.

$path->cd('./x');
# should display '/a/b/c/d/x'.

$path->cd('x');
# should display '/a/b/c/d/x'.

$path->cd('/a');
# should display '/a'.

$path->cd('../../e/../f');
# should display '/a/b/f'.

$path->cd('/d/e/../a');
# should display '/d/a'.
```
