<?php

//------------------------

// display the boards
function display_board($board1, $board2){
    foreach ($board1 as $key => $value){
        foreach ($value as $value2){
            print "\e[1;37;44m" . $value2. " \e[0m";     
        }
        echo "    |    ";
        foreach ($board2[$key] as $value2){
            print "\e[1;37;44m" .$value2 . " \e[0m";
        }
        echo "\n";
    }    
}
//display the fucki** ship
function place_ship(&$board1,&$board2){  
    $converter_letter=["A"=>"0","B"=>"1","C"=>"2","D"=>"3","E"=>"4","F"=>"5","G"=>"6","H"=>"7","I"=>"8","J"=>"9"];
    $converter_number=["1"=>"0","2"=>"1","3"=>"2","4"=>"3","5"=>"4","6"=>"5","7"=>"6","8"=>"7","9"=>"8","10"=>"9"];
    $place=trim(fgets(STDIN));
    $coordonate_Y_start=$converter_letter[$place[0]];
    $coordonate_X_start=$converter_number[$place[1]];
    $coordonate_Y_end=$converter_letter[$place[3]];
    $coordonate_X_end=$converter_number[$place[4]];
    $is_right=false;  
    while (!$is_right){
    if ($coordonate_X_start!=$coordonate_X_end && $coordonate_Y_start!=$coordonate_Y_end){
        print "Pas de bateau en diagonale \n";
        $place=trim(fgets(STDIN));
        $coordonate_Y_start=$converter_letter[$place[0]];
        $coordonate_X_start=$converter_number[$place[1]];
        $coordonate_Y_end=$converter_letter[$place[3]];
        $coordonate_X_end=$converter_number[$place[4]];
       }
    else {
     $is_right=true;
       }
    }
    
    if ($coordonate_X_start<=$coordonate_X_end && $coordonate_Y_start==$coordonate_Y_end){
        while ($coordonate_X_start<=$coordonate_X_end){
            $board1[$coordonate_Y_start][$coordonate_X_start]="O";
            $coordonate_X_start++;
        }
    
        
    }
    else if ($coordonate_X_start==$coordonate_X_end && $coordonate_Y_start<=$coordonate_Y_end){
        while ($coordonate_Y_start<=$coordonate_Y_end){
                $board1[$coordonate_Y_start][$coordonate_X_start]="O";
                $coordonate_Y_start++;
            }
            
        }
        display_board($board1,$board2);

}

//------------------------

$wanna_play = true;
while($wanna_play){
    // initialisation of the board
    $board1 = [];
    $board2 = [];
    for($i = 0; $i <= 9; $i++){
        for($j = 0; $j <= 9 ; $j++){
            $board1[$i][$j] = "~";
            $board2[$i][$j] = "~";
        }
    }
    place_ship($board1,$board2);
    // ship placement

    // IA ship placement

    //n
    //display_board($board1, $board2);

    // game
    $victory=false;
    while(!$victory){
        $victory = true;
    }
    // replay
    echo "Wanna replay? (y/n)\n";
    if(trim(fgets(STDIN)) != "y"){
        $wanna_play = false;
        echo "Byeeeeeeeeeeee\n";
        continue;
    }
    $wanna_play = false;
}
