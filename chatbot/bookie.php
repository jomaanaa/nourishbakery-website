<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #f3c6d3;
            border-radius: 50%;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #chat-window {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 300px;
            height: 400px;
            background: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            display: none;
            flex-direction: column;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        #chat-header {
            background-color: #f3c6d3;
            color: #1e1e1e;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }

        #chat-body {
            flex-grow: 1;
            padding: 10px;
            overflow-y: auto;
        }

        #chat-input-container {
            display: flex;
            border-top: 1px solid #ccc;
        }

        #chat-input {
            flex-grow: 1;
            padding: 10px;
            border: none;
            outline: none;
        }

        #send-button {
            padding: 10px;
            background-color: #f3c6d3;
            color: #1e1e1e;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="chat-icon">💬</div>
    <div id="chat-window">
        <div id="chat-header">Chatbot</div>
        <div id="chat-body"></div>
        <div id="chat-input-container">
            <input id="chat-input" type="text" placeholder="Type a message...">
            <button id="send-button">Send</button>
        </div>
    </div>

    <script>
        const chatIcon = document.getElementById('chat-icon');
        const chatWindow = document.getElementById('chat-window');
        const chatInput = document.getElementById('chat-input');
        const chatBody = document.getElementById('chat-body');
        const sendButton = document.getElementById('send-button');

        // Toggle chat window visibility
        chatIcon.addEventListener('click', () => {
            chatWindow.style.display = chatWindow.style.display === 'none' ? 'flex' : 'none';
        });

        // Send message to chatbot
        sendButton.addEventListener('click', () => {
            const userMessage = chatInput.value;
            if (!userMessage) return;

            // Add user message to chat
            addMessageToChat('You', userMessage);

            // Send request to Python chatbot
            fetch('http://127.0.0.1:5000/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ user_input: userMessage }),
            })
                .then((response) => response.json())
                .then((data) => {
                    // Add chatbot response to chat
                    addMessageToChat('Chatbot', data.response);
                })
                .catch(() => {
                    addMessageToChat('Chatbot', 'Error connecting to server.');
                });

            chatInput.value = '';
        });

        function addMessageToChat(sender, message) {
            const messageElement = document.createElement('div');
            messageElement.textContent = `${sender}: ${message}`;
            chatBody.appendChild(messageElement);
            chatBody.scrollTop = chatBody.scrollHeight;
        }
    </script>
</body>
</html>