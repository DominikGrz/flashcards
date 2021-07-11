<?php
//Preload
$f = 'data.json';
$json = json_decode(file_get_contents($f));
$c = count($json->flashcard);
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flashcards</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="#">HOME</a>
        <a href="learn.php">LEARN</a>
        <a href="create.php">CREATE SET</a>
    </nav>
    <span></span>
    <main>
        <div class="container">
            <div class="header">
                <h1>Flashcard Sets - フラッシュカードセット</h1>
            </div>
            <div class="flex">
                <?php

                if($c == FALSE || $c == NULL){
                    
                ?>

                <div class="no-set">
                <p>
                    Looks like you have not created a set yet. <br>
                    Click <a id="link" href="create.php">here</a> 
                    to create your first set!
                </p>
                </div>

                <?php
                } else{

                    for($i = 0; $i < $c; $i++){
                        echo '<div class="item">'.
                        '<h2>'. ($json->flashcard[$i]->name) . '</h2>
                        <p>Vocabulary: '. (count($json->flashcard[$i]->vocabulary)) . '</p><br>
                        <form action="learn.php" method="POST"><input type="hidden" name="data-set" value="'. $i .'">
                        <input type="submit" value="LEARN"></<input></form></div>';
                    }

                    /*for($i = 0; $i < $c; $i++)
                    {
                        echo '<div class="item">'.
                        '<h2>'. ($json->flashcard[$i]->name) . '</h2>';

                        for($j = 0; $i < count($json->flashcard) - 1; $i++)
                        {
                        echo '<p>Vocabulary-Word: '. ($json->flashcard[$i]->vocabulary[$j]->word). '</p><br>
                        <p>Vocabulary-Answer: '. ($json->flashcard[$i]->vocabulary[$j]->answer). '</p>
                        <a href="#">LEARN</a></div>';
                        }
                    }*/
                }
                ?>
            </div>
            <div class="statistics">
                <div class="stat-item">
                    <div id="pfp">
                        <span id="pf-name">Dominik</span>
                    </div>
                    

                </div>
                
            </div>
        </div>
    </main>
</body>
</html>