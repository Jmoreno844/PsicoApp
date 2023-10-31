<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .chat-list {
            background-color: #fff;
            padding: 10px;
        }

        .chat {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            background-color: #0078FF;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-info {
            flex: 1;
        }

        h3 {
            font-size: 18px;
            margin: 0;
        }

        p {
            font-size: 14px;
            color: #777;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="chat-list">
        <div class="chat">
            <a href="chat1.html">
                <div class="user-avatar"></div>
                <div class="user-info">
                    <h3>User 1</h3>
                    <p>Last message...</p>
                </div>
            </a>
        </div>

        <div class="chat">
            <a href="chat2.html">
                <div class="user-avatar"></div>
                <div class="user-info">
                    <h3>User 2</h3>
                    <p>Last message...</p>
                </div>
            </a>
        </div>

        <!-- Add more chat elements here -->
    </div>
</body>
</html>
