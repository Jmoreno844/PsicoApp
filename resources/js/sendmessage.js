function sendMessage(otherUserId) {
    var messageInput = $('#messageInput');
    var messageText = messageInput.val().trim();

    if (messageText !== '') {
        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '../resources/php/add_message_method.php',
            data: {
                user_id: otherUserId,
                message: messageText,
            },
            dataType: 'html',
            success: function (data) {
                $('#messagesContainer').html(data);
                messageInput.val('');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error:', textStatus, errorThrown);
            },
        });
    }
}
