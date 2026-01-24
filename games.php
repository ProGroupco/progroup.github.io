<?php
// ======================
// ProGroupco Games Hub
// Single PHP File - All Games
// ======================

$stdin = fopen('php://stdin','r');

function clear(){ system('clear'); }

// === MENU ===
function showMenu() {
    echo "========================\n";
    echo "🎮 ProGroupco Games Hub 🎮\n";
    echo "========================\n";
    echo "Choose a game:\n";
    echo "1. 2D Minecraft\n";
    echo "2. Pac-Man\n";
    echo "3. Dart Target\n";
    echo "4. Exit\n";
    echo "Enter choice (1-4): ";
}

// ======================
// 1. 2D Minecraft
// ======================
function minecraft2D() {
    $width=20;$height=10;
    $player=['x'=>5,'y'=>5];
    $stdin = fopen('php://stdin','r');
    while(true){
        system('clear');
        for($y=0;$y<$height;$y++){
            for($x=0;$x<$width;$x++){
                if($x==$player['x'] && $y==$player['y']) echo 'P';
                elseif($y>$height-3) echo '#';
                else echo '.';
            }
            echo PHP_EOL;
        }
        echo "Use WASD to move, Q to quit\n";
        $input=trim(fgets($stdin));
        if($input=='w') $player['y']=max(0,$player['y']-1);
        if($input=='s') $player['y']=min($height-1,$player['y']+1);
        if($input=='a') $player['x']=max(0,$player['x']-1);
        if($input=='d') $player['x']=min($width-1,$player['x']+1);
        if($input=='q') break;
    }
}

// ======================
// 2. Pac-Man
// ======================
function pacman() {
    $width=20;$height=10;$player=['x'=>1,'y'=>1];
    $walls=[];
    for($i=0;$i<$width;$i++){ $walls[]=['x'=>$i,'y'=>0]; $walls[]=['x'=>$i,'y'=>$height-1]; }
    for($i=1;$i<$height-1;$i++){ $walls[]=['x'=>0,'y'=>$i]; $walls[]=['x'=>$width-1,'y'=>$i]; }
    $stdin = fopen('php://stdin','r');

    while(true){
        system('clear');
        for($y=0;$y<$height;$y++){
            for($x=0;$x<$width;$x++){
                $isWall=false;
                foreach($walls as $w){ if($w['x']==$x && $w['y']==$y){ $isWall=true; break; } }
                if($player['x']==$x && $player['y']==$y) echo 'O';
                elseif($isWall) echo '#';
                else echo '.';
            }
            echo PHP_EOL;
        }
        echo "Use WASD to move, Q to quit\n";
        $input=trim(fgets($stdin));
        $nx=$player['x']; $ny=$player['y'];
        if($input=='w') $ny--;
        if($input=='s') $ny++;
        if($input=='a') $nx--;
        if($input=='d') $nx++;
        if($input=='q') break;
        $collision=false;
        foreach($walls as $w){ if($w['x']==$nx && $w['y']==$ny) $collision=true; }
        if(!$collision){ $player['x']=$nx; $player['y']=$ny; }
    }
}

// ======================
// 3. Dart Game
// ======================
function dartGame() {
    $score=0;
    $stdin = fopen('php://stdin','r');
    while(true){
        system('clear');
        $target=rand(1,10);
        echo "🎯 Dart Game! Type a number 1-10 for your throw, Q to quit\n";
        echo "Target: $target\n";
        echo "Your throw: ";
        $input=trim(fgets($stdin));
        if(strtolower($input)=='q') break;
        $throw=intval($input);
        if($throw==$target){ $score+=10; echo "Bullseye! +10 points\n"; }
        else{ $score+=max(0,10-abs($throw-$target)); echo "Score: ".max(0,10-abs($throw-$target))."\n"; }
        echo "Total Score: $score\n";
        echo "Press Enter to continue..."; fgets($stdin);
    }
}

// ======================
// MAIN LOOP
// ======================
while(true){
    showMenu();
    $choice = trim(fgets($stdin));
    if($choice=='1') minecraft2D();
    elseif($choice=='2') pacman();
    elseif($choice=='3') dartGame();
    elseif($choice=='4') { echo "Thanks for playing! Bye!\n"; break; }
    else { echo "Invalid choice. Press Enter..."; fgets($stdin); }
}
?>

