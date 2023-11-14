
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../resources/js/sendmessage.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .chat-container {
            width: 90%;
            max-width: 400px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
        }

        .messages {
            overflow-y: scroll;
            height: 300px;
            padding: 10px;
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            word-wrap: break-word;
            max-width: 70%;
        }

        .message.sent {
            background-color: #DCF8C6;
            align-self: flex-end;
        }

        .message.received {
            background-color: #EAEAEA;
            align-self: flex-start;
        }

        .input-container {
            padding: 10px;
            border-top: 1px solid #ccc;
            display: flex;
            align-items: center;
        }

        #messageInput {
            flex: 1;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-right: 10px;
        }

        #sendMessageBtn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 5px; /* Added border-radius */
        }

        /* Additional styling for user information */
        .user-info {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .user-info-line {
            border: none;
            height: 1px;
            background-color: #ccc;
            margin-bottom: 10px;
        }
    </style>
    <!-- Add this script inside the <head> tag -->
</head>
<body>

<div class="chat-container">
    <div class="messages" id="messagesContainer">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            // Start the session
            session_start();
        }
        include __DIR__ . '..\..\php\functions.php';

        // Check if the user is authenticated
        if (isset($_SESSION['user_id'])) {
            $loggedInUserId = $_SESSION['user_id'];
            $mysqli = new mysqli('localhost', 'root', '', 'psicoapp');
            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            // Fetch otherUserId from the mensualidades table
            $otherUserIdQuery = "SELECT id_psicologo FROM mensualidades WHERE id_usuario = '$loggedInUserId'";
            $result = $mysqli->query($otherUserIdQuery);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $otherUserId = $row['id_psicologo'];

                if ($otherUserId !== null) {
                    // Display the name of the other user in a bigger font with a line below it
                    echo '<div class="user-info">';
                    echo fetchUserName($otherUserId);
                    echo '</div>';
                    echo '<hr class="user-info-line">';
                } else {
                    echo "Other user ID not found in the mensualidades table for the logged-in user.";
                }

                $currentUserID = $loggedInUserId;
                echo '<script src="../resources/js/sendmessage.js" data-other-user-id="' . $otherUserId . '"></script>';

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['message'])) {
                        $messageText = $_POST['message'];

                        // Insert a new message into the database
                        $sqlInsert = "INSERT INTO messages (sender_id, receiver_id, message_text) VALUES (?, ?, ?)";
                        $stmtInsert = $mysqli->prepare($sqlInsert);
                        $stmtInsert->bind_param("iis", $loggedInUserId, $otherUserId, $messageText);
                        $stmtInsert->execute();
                        $stmtInsert->close();
                    }
                }

                // Fetch and display messages from the database
                $messages = fetchMessages($currentUserID, $otherUserId);

                foreach ($messages as $message) {
                    $isSentByCurrentUser = ($message['sender_id'] == $currentUserID);
                    $messageClass = ($isSentByCurrentUser) ? 'sent' : 'received';

                    echo '<div class="message ' . $messageClass . '">';
                    echo $message['message_text'];
                    echo '</div>';
                }
            } else {
                echo "Other user ID not found in the mensualidades table for the logged-in user.";
            }

            $mysqli->close();
        } else {
            echo "User not authenticated.";
        }
        ?>
    </div>
    <div class="input-container">
        <input type="text" id="messageInput" placeholder="Type your message...">
        <button id="sendMessageBtn" onclick="sendMessage(<?php echo $otherUserId; ?>)">Send</button>
    </div>
</div>

</body>
</html>

