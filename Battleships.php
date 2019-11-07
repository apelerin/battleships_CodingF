<?php

// PENSER A METTTRE EN CONSTANTES LES COORDONNES


const CONVERTER_LETTER=["A"=>"0","B"=>"1","C"=>"2","D"=>"3","E"=>"4","F"=>"5","G"=>"6","H"=>"7","I"=>"8","J"=>"9"];
const CONVERTER_NUMBER=["1"=>"0","2"=>"1","3"=>"2","4"=>"3","5"=>"4","6"=>"5","7"=>"6","8"=>"7","9"=>"8","10"=>"9"];

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

// length of the boat
$list_boat=[2,3,4,5,6];
function lenght_boat($coordonate_Y_start,$coordonate_X_start,$coordonate_Y_end,$coordonate_X_end,&$list_boat){
    //check the lenght of the boat
    if ($coordonate_X_start<$coordonate_X_end && $coordonate_Y_start==$coordonate_Y_end){
        $lenght_boat=$coordonate_X_end-$coordonate_X_start+1;

        $list_boat = array_diff($list_boat, [$lenght_boat]);
    }
    else if ($coordonate_Y_start<$coordonate_Y_end && $coordonate_X_start==$coordonate_X_end){
        $lenght_boat=$coordonate_Y_end-$coordonate_Y_start+1;        
        
        $list_boat = array_diff($list_boat, [$lenght_boat]);
    }
    
    else{
        print "Les bateaux de 1 n'existent pas fdp de tes grands morts, personne ne t'a jamais aimer, meme pas ta mere, t'es meme adopter, tout le monde fait semblant et tu le sais, va te pendre, ta vie entière est une errreur, zebi <3\n";
    }
    if ($lenght_boat>6){
        print "Ne place pas un bateau de plus de 6 fdp de tes grands morts, personne ne t'a jamais aimer, meme pas ta mere, t'es meme adopter, tout le monde fait semblant et tu le sais, va te pendre, ta vie entière est une errreur, zebi <3\n";
        return "\n";
    }
    foreach ($list_boat as $value){
        print $value . "\n";
    }
}
// place ships
function place_ship(&$board1,&$board2,$list_boat){
    $is_right=false;  
    while(!$is_right){
        if(count($list_boat) == 0){
            break;
        }
        $place=trim(fgets(STDIN));
        $coordonate_Y_start=CONVERTER_LETTER[$place[0]];
        $coordonate_X_start=CONVERTER_NUMBER[$place[1]];
        $coordonate_Y_end=CONVERTER_LETTER[$place[3]];
        $coordonate_X_end=CONVERTER_NUMBER[$place[4]];
        if($coordonate_X_start!=$coordonate_X_end && $coordonate_Y_start!=$coordonate_Y_end){
            print "Pas de bateau en diagonale \n";   
            continue;
        }
        lenght_boat($coordonate_Y_start,$coordonate_X_start,$coordonate_Y_end,$coordonate_X_end,$list_boat);
        if ($coordonate_X_start<=$coordonate_X_end && $coordonate_Y_start==$coordonate_Y_end){
            while ($coordonate_X_start<=$coordonate_X_end){
                $board1[$coordonate_Y_start][$coordonate_X_start]="O";
                $coordonate_X_start++;
            }    
        }
        else if($coordonate_X_start==$coordonate_X_end && $coordonate_Y_start<=$coordonate_Y_end){
            while ($coordonate_Y_start<=$coordonate_Y_end){
                    $board1[$coordonate_Y_start][$coordonate_X_start]="O";
                    $coordonate_Y_start++;
            }
        }
    }

    
    display_board($board1,$board2);
}

function player_fire(&$board){
    $is_right = false;
    while(!$is_right){
        echo "Please choose where you wanna fire(Ex A1): ";
        $position = trim(fgets(STDIN));
        $x = CONVERTER_LETTER[$position[0]];
        $y = CONVERTER_NUMBER[$position[1]];

        if($board[$x][$y] != "X"){
            if($board[$x][$y] == "O"){
                $board[$x][$y] = "@";
                $is_right = true;
                // mettre à jour le scoring
                return;
            }
            $board[$x][$y] = "X";
            $is_right = true;
        }
    }
}

function computer_fire(&$board){
    $is_right = false;
    while(!$is_right){
        $x = mt_rand(0, 9);
        $y = mt_rand(0, 9);

        // test is the cell is one the computer already fired on 
        if($board[$x][$y] != "X"){
            if($board[$x][$y] == "O"){
                $board[$x][$y] = "@";
                $is_right = true;
                // mettre à jour le scoring
                return;
            }
            $board[$x][$y] = "X";
            $is_right = true;
        }
    }
}


function is_winned(){
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

    place_ship($board1,$board2,$list_boat);

    // ship placement

    // IA ship placement

    //n
    //display_board($board1, $board2);

    // game
    $victory=false;
    while(!$victory){
        // afficher les stats
        //player_fire($board2);
        //is_winned(); // don't forget the if
        //computer_fire($board1);
        //is_winned(); //don't forget the if and break
        $victory = true;
    }
    // replay
    echo "Wanna replay? (y/n)\n";
    if(trim(fgets(STDIN)) != "y"){
        $wanna_play = false;
        echo "Byeeeeeeeeeeee\n";
        continue;
    }
}
