@extends('layout.chats')

@section('chats_list')

    <?php


// Start the session
session_start();

// Check if the user is authenticated
if (isset($_SESSION['user_id'])) {
    $loggedInUserId = $_SESSION['user_id'];


} else {
    // User not authenticated
    echo "User not authenticated.";
}
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'psicoapp';

// Create a MySQLi connection
        $mysqli = new mysqli($hostname, $username, $password, $database);

// Check the connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
            }
    // Query to get the count of unique users the logged-in user exchanged messages with
    $sql = "SELECT COUNT(DISTINCT CASE WHEN sender_id = ? THEN receiver_id ELSE sender_id END) AS user_count FROM messages WHERE sender_id = ? OR receiver_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iii", $loggedInUserId, $loggedInUserId, $loggedInUserId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $userCount = $row['user_count'];

 //   echo "Total users: " . $userCount . "<br>";

    // Query to get the list of unique users the logged-in user exchanged messages with
    $sql = "SELECT DISTINCT CASE WHEN sender_id = ? THEN receiver_id ELSE sender_id END AS other_user_id FROM messages WHERE sender_id = ? OR receiver_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iii", $loggedInUserId, $loggedInUserId, $loggedInUserId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Iterate through the list of users
    while ($row = $result->fetch_assoc()) {
        $otherUserId = $row['other_user_id'];

        // Fetch user details from the users table
        $sqlUserDetails = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmtUserDetails = $mysqli->prepare($sqlUserDetails);
        $stmtUserDetails->bind_param("i", $otherUserId);
        $stmtUserDetails->execute();
        $resultUserDetails = $stmtUserDetails->get_result();
        $userDetails = $resultUserDetails->fetch_assoc();

        echo '<div class="chat">
                <a href="messages?user_id=' . $userDetails['id_usuario'] . '">
                    <div class="user-avatar"></div>
                    <div class="user-info">
                        <h3>' . $userDetails['nombres'] . ' ' . $userDetails['apellidos'] . '</h3>
                        <p>Last message...</p>
                    </div>
                </a>
            </div>';
    }

    // Close prepared statements and database connection
    $stmt->close();
    $stmtUserDetails->close();
    $mysqli->close();
    ?>

    @endsection

