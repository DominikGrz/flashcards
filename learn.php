<?php
//Preload
$f = 'data.json';
$json = json_decode(file_get_contents($f));
$c = count($json->flashcard);
$vocCount = 0;

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['data-set'])){
        $setNo = $_POST['data-set'];
    }
}
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
        <a href="#">LEARN</a>
        <a href="create.php">CREATE SET</a>
    </nav>
    <span></span>
    <main>
        <div id="inner">
        <?php if($_SERVER['REQUEST_METHOD'] == "POST"){
            if($vocCount == 0){
                shuffle($json->flashcard[$setNo]->vocabulary);

                echo '<form action="" method="POST">
                    <div id="learn-card">
                        <h1 id="set-name">'. ($json->flashcard[$setNo]->name). '</h1><br>
                        <span id="vocab">Vocabulary ' . ($vocCount + 1) . '/' . count($json->flashcard[$setNo]->vocabulary) . '</span><br><br><br><br>
                        <span id="req-word">'. $json->flashcard[$setNo]->vocabulary[$vocCount]->word . '</span>
                    </div>
                    <div id="input-form">
                        <input type="text" id="req-word" placeholder="Translation" size="28"><input style="font-size: 24px; margin-top: 25px;" type="submit" value="CHECK">
                    </div>
                </form>';
            } else {

            }


        } else {
        ?>
            <form action="" method="POST">       
                <div id="learn-card">
                    <h1 id="set-name">Setname</h1><br>
                    <span id="vocab">Vocabulary x/y</span><br><br><br><br>
                    <span id="req-word">Test</span>  
                </div>
                <div id="input-form">
                    <input type="text" id="req-word" placeholder="Translation" size="28"><input style="font-size: 24px; margin-top: 25px;" type="submit" value="CHECK">
                </div>
            </form>
        <?php
        }
        ?>
        </div>
    </main>
</body>
</html>