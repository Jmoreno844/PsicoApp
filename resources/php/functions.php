<?php

function fetchMessages($currentUserID, $otherUserID) {
    $mysqli = new mysqli('localhost', 'root', '', 'psicoapp');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Fetch messages from the database
    $sql = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iiii", $currentUserID, $otherUserID, $otherUserID, $currentUserID);
    $stmt->execute();
    $result = $stmt->get_result();

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    $stmt->close();
    $mysqli->close();

    return $messages;
}

function fetchUserName($userId) {
    $mysqli = new mysqli('localhost', 'root', '', 'psicoapp');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT nombres, apellidos FROM usuarios WHERE id_usuario = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($name, $lastname);

    $userInfo = null;

    if ($stmt->fetch()) {
        $userInfo = $name . ' ' . $lastname;

    }

    $stmt->close();
    $mysqli->close();

    return $userInfo;
}
