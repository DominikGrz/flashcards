<?php
//Preload
$f = 'data.json';
$json = json_decode(file_get_contents($f));
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flashcards</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="create.css">
    <script src="main.js"></script>
</head>
<body>
    <nav>
        <a href="index.php">HOME</a>
        <a href="learn.php">LEARN</a>
        <a href="#">CREATE SET</a>
    </nav>
    <span></span>
    <main>
    <div class="create-container">
        <div class="lel">
            <form action="" method="POST">
            <input style="font-size: 24px; margin-bottom: 10px;" type="text" name="title" placeholder="#FLASHCARD NAME">
                <div class="c-flex">
                    <div class="c-flex-item">
                        <label for="word">Word: </label>
                        <input type="text"  id="word" name="word_1">
                        <a class="change">EXCHANGE</a>
                        <label for="answer">Translation: </label>
                        <input type="text" id="answer" name="answer_1">
                    </div>
                    <div class="c-flex-item">
                        <label for="word">Word: </label>
                        <input type="text"  id="word" name="word_2">
                        <a class="change">EXCHANGE</a>
                        <label for="answer">Translation: </label>
                        <input type="text" id="answer" name="answer_2">
                    </div>
                    <div class="c-flex-item">
                        <label for="word">Word: </label>
                        <input type="text"  id="word" name="word_3">
                        <a class="change">EXCHANGE</a>
                        <label for="answer">Translation: </label>
                        <input type="text" id="answer" name="answer_3">
                    </div>
                    <div class="c-flex-item">
                        <label for="word">Word: </label>
                        <input type="text"  id="word" name="word_4">
                        <a class="change">EXCHANGE</a>
                        <label for="answer">Translation: </label>
                        <input type="text" id="answer" name="answer_4">
                    </div>
                </div>
                <br><a href="#lel" class="eksde del" id="lel" onclick="appendRow()">-</a><a href="#lel" class="eksde" id="lel" onclick="appendRow()">ADD ROW</a>
                <input style="font-size: 24px;" type="submit" value="CREATE NEW SET" onclick="getChildCount();">

                <?php
                $err_name = FALSE;
                $err_empty = FALSE;
                $err_input = FALSE;
            
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                    echo '<script>getChildCount();</script>';

                    if($_POST['title'] == "") $err_empty = TRUE;

                    for($i = 0; $i < count($json->flashcard); $i++){
                        if($json->flashcard[$i]->name == $_POST['title']){
                            $err_name = TRUE;
                             break;
                        }
                    }

                    for($i = 0; $i < $_COOKIE['c']; $i++){
                        if($_POST['answer_' . ($i + 1)] == ""){
                            $err_input = TRUE;
                             break;
                        }
                        if($_POST['word_' . ($i + 1)] == ""){
                            $err_input = TRUE;
                             break;
                        }
                    }
                    
                    if($err_name == FALSE && $err_input == FALSE && $err_input == FALSE){
                        //print_r($set_names);

                        $set = array();

                        $set['name'] = $_POST['title'];
                        $set['vocabulary'] = array();
                        
                        for($i = 0; $i < $_COOKIE['c']; $i++)
                        {
                            $set['vocabulary'][$i] = array(
                                "word" => $_POST['word_' . ($i + 1)], 
                                "answer" => $_POST['answer_' . ($i + 1)]);
                        }

                        array_push($json->flashcard, $set);

                        file_put_contents($f, json_encode($json, JSON_PRETTY_PRINT));

                        echo '<p style="font-size: 24px; padding: 15px; text-align: center;">New set successully created!</p>';
                    } else {
                        if($err_input == TRUE){
                            echo '<p style="font-size: 24px; padding: 15px; text-align: center;">Please fill out all input boxes!</p>';
                        }
                        if($err_empty == TRUE){
                            echo '<p style="font-size: 24px; padding: 15px; text-align: center;">The set name can not be empty!</p>';
                        }
                        if($err_name == TRUE){
                            echo '<p style="font-size: 24px; padding: 15px; text-align: center;">There is already a set with this name!</p>';
                        }
                        
                            
                    }
                }
            ?>
            </form>
            
        </div>

    </div>
    </main>
</body>
</html>