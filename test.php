<?php 
$list=[1,2,3,3,5,6];
$list = \array_diff($list, ["3"]);

foreach ($list as $value){
print $value;

}
print "\n";