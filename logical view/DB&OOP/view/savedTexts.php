<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ../../index.php?message=Ju nuk jeni te loguar ne App!");
    exit();
} else {
    // Include the TTSRepository class
    include_once '../repository/ttsRepository.php';

    // Create an instance of the TTSRepository
    $ttsRepository = new TTSRepository();

    // Retrieve all saved TTS data using the repository
    $user_id = $_SESSION['user_id'];
    $savedTexts = $ttsRepository->getAllSavedTexts($user_id);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Saved Texts</title>
        <link rel="stylesheet" type="text/css" href="../../Css/savedTexts.css">
    </head>
    <body>
        <h2>Tekstet e ruajtura</h2>

        <?php
        if($savedTexts){ foreach ($savedTexts as $savedText): ?>
            <div>
                <strong>ID:</strong> <?php echo $savedText['id']; ?><br>
                <strong>Language:</strong> <?php echo $savedText['language']; ?><br>
                <strong>Text:</strong> <?php echo $savedText['text']; ?><br>
                <hr>
            </div>
        <?php endforeach;
        }else{
            ?>
            <strong>Nuk ka të dhëna të ruajtura!</strong>
            <?php
        } ?>
        <button onclick="window.location.href='../../index.php'">Go to Index</button>
    </body>
    </html>
<?php
}
?>