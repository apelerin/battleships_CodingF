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

    display_board($board1, $board2);

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
    }

}
