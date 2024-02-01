<?php
include_once '../models/tts.php';
include '../db_conn.php';

class TTSRepository
{
    private $connection;

    public function __construct()
    {
        $conn = new DBConnection;
        $this->connection = $conn->startConnection();

        if (!$this->connection) {
            // Handle connection error (exit, log, or display an error message)
            exit("Failed to connect to the database");
        }
    }

    public function saveTTS($user_id, $language, $text)
    {
        $id = rand(100, 999);
        $tts = new TTS($id, $user_id, $language, $text);
        return $this->saveToDatabase($tts);
    }

    public function getAllSavedTexts($user_id)
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM savedtext WHERE user_ID = ?";
        $statement = $conn->prepare($sql);
        $statement->execute([$user_id]);
        $savedTexts = $statement->fetchAll();

        return $savedTexts;
    }

    // Add a method to save the TTS data to the database
    private function saveToDatabase(TTS $tts)
    {
        $conn = $this->connection;
        $sql = "INSERT INTO savedtext (id, user_ID, language, text) VALUES (?,?,?,?)";

        $statement = $conn->prepare($sql);
        $result = $statement->execute([$tts->getId(), $tts->getUserId(), $tts->getLanguage(), $tts->getText()]);
        
        return $result;  // Return true if the execution was successful, false otherwise
    }
}

// Moved the form submission handling here
$ttsRepository = new TTSRepository();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveBtn'])) {
    session_start();
    // Handle saving the TTS data to the database
    $user_id = $_SESSION['user_id'];
    $languageMappings = [
        1 => "English Female",
        2 => "English Male",
        3 => "Albanian Female",
        4 => "Albanian Male"
    ];

    $language = isset($_POST['language']) ? $_POST['language'] : null;
    if (array_key_exists($language, $languageMappings)) {
        $language = $languageMappings[$language];
    } else {
        // Handle the case where the selected language is not in the mapping
        // You might want to set a default language or show an error message
        $language = "Unknown Language";
    }
    $text = $_POST['ttsInput'];

    // Save TTS data using the repository
    $saveResult = $ttsRepository->saveTTS($user_id, $language, $text);

    if ($saveResult) {
        // Redirect back to index.php with a success message
        header("Location: ../../index.php?message=U ruajt me sukses");
        exit();
    } else {
        // Redirect back to index.php with an error message
        header("Location: ../../index.php?message=Diçka shkoi keq gjatë ruajtjes së tekstit!");
        exit();
    }
}
?>