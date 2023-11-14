<?php
session_start();
include 'functions.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message'])) {
        $loggedInUserId = $_SESSION['user_id'];
        $otherUserId = $_POST['user_id'];
        $messageText = $_POST['message'];

        $mysqli = new mysqli('localhost', 'root', '', 'psicoapp');
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Insert a new message into the database
        $sqlInsert = "INSERT INTO messages (sender_id, receiver_id, message_text) VALUES (?, ?, ?)";
        $stmtInsert = $mysqli->prepare($sqlInsert);
        $stmtInsert->bind_param("iis", $loggedInUserId, $otherUserId, $messageText);
        $stmtInsert->execute();
        $stmtInsert->close();

        $mysqli->close();

        // Fetch and display messages from the database
        $messages = fetchMessages($loggedInUserId, $otherUserId);

        foreach ($messages as $message) {
            $isSentByCurrentUser = ($message['sender_id'] == $loggedInUserId);
            $messageClass = ($isSentByCurrentUser) ? 'sent' : 'received';

            echo '<div class="message ' . $messageClass . '">';
            echo $message['message_text'];
            echo '</div>';
        }
    }
}

echo '<script>window.location.href = "/PsicoApp/public/messages?user_id=' . $_POST['user_id'] . '";</script>';
exit();
?>
