<?php 
$converter_letter=["A"=>"0","B"=>"1","C"=>"2","D"=>"3","E"=>"4","F"=>"5","G"=>"6","H"=>"7","I"=>"8","J"=>"9"];
$converter_number=["1"=>"0","2"=>"1","3"=>"2","4"=>"3","5"=>"4","6"=>"5","7"=>"6","8"=>"7","9"=>"8","10"=>"9"];
$place=trim(fgets(STDIN));
$coordonate_Y_start=$converter_letter[$place[0]];
$coordonate_X_start=$converter_number[$place[1]];
$coordonate_Y_end=$converter_letter[$place[3]];
$coordonate_X_end=$converter_number[$place[4]];
print $coordonate_Y_start . "\n";
print $coordonate_X_start. "\n";
print $coordonate_Y_end. "\n";
print $coordonate_X_end. "\n";