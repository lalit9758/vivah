$(document).ready(function() {
    let currentReceiverId = null;
    let chatListUpdateInterval = 5000; // Adjust the interval as needed

    // Function to fetch and display chat list
    function fetchChatList() {
        $.ajax({
            url: 'controllers/vivahController?action=getChatList',
            method: 'GET',
            success: function(response) {
                const chatData = JSON.parse(response);
                
                if (chatData.status === 'success' && Array.isArray(chatData.data)) {
                    const chatListElement = $('#chat-items');
                    chatListElement.empty(); // Clear any existing content

                    chatData.data.forEach(chat => {
                        const chatItem = `
                            <li class="db-chat-trig" data-receiver-id="${chat.receiver_id}" data-partner-name="${chat.partner_name}" data-img-src="${chat.imgSrc || 'assets/images/Default_profile.jpg'}">
                                <div class="db-chat-pro"> 
                                    <img src="${chat.imgSrc || 'assets/images/Default_profile.jpg'}" alt=""> 
                                </div>
                                <div class="db-chat-bio">
                                    <h5>${chat.partner_name}</h5>
                                    <span>${chat.message}</span>
                                </div>
                            </li>
                        `;
                        chatListElement.append(chatItem); // Append each chat item
                    });

                    // Attach click event to dynamically loaded chat items
                    $('.db-chat-trig').on('click', function() {
                        const receiverId = $(this).data('receiver-id');
                        const partnerName = $(this).data('partner-name');
                        const imgSrc = $(this).data('img-src');

                        if (receiverId !== currentReceiverId || !$(".chatbox").hasClass("open")) {
                            currentReceiverId = receiverId;
                            openChatWindow(receiverId, partnerName, imgSrc);
                        } else {
                            $(".chatbox").removeClass("open"); // Close chatbox if same ID clicked
                        }
                    });
                } else {
                    console.error('Invalid chat data structure or status');
                }
            },
            error: function() {
                alert('Failed to fetch chat list');
            }
        });
    }

    // Function to open chat window and load messages
    function openChatWindow(receiverId, partnerName, imgSrc) {
        $(".chatbox").addClass("open");

        // Update chatbox header with dynamic data
        $('.intename2').text(partnerName); // Set partner name dynamically
        $('.intephoto2').attr('src', imgSrc); // Set profile photo dynamically

        // Clear previous chat content and fetch new messages
        $('#chatContent').empty();
        fetchMessages(receiverId);

        // Scroll to bottom to focus on the last message
        setTimeout(scrollToBottom, 100); // Delay to ensure content is fully loaded

        // Update the form to send messages to this receiver
        $('#new_chat_form').off('submit').on('submit', function(event) {
            event.preventDefault();
            const message = $('#chat_message').val();

            $.ajax({
                url: 'controllers/vivahController',
                method: 'POST',
                data: {
                    action: 'sendMessage',
                    receiver_id: receiverId,
                    message: message
                },
                success: function(response) {
                    const res = JSON.parse(response);
                    if (res.status === 'success') {
                        $('#chat_message').val(''); // Clear the input
                        // Append the new message directly to chat content
                        appendMessage(message, 'chat-rhs');
                        // Update the chat list to include the new conversation
                        fetchChatList();
                    } else {
                        alert('Message sending failed');
                    }
                }
            });
        });

        // Poll for new messages every second
        setInterval(function() {
            if (currentReceiverId === receiverId) {
                fetchMessages(receiverId);
            }
        }, 1000); // Adjust the interval as needed
    }

    // Function to fetch and display messages
    function fetchMessages(receiverId) {
        $.ajax({
            url: 'controllers/vivahController?action=fetchMessages',
            method: 'GET',
            data: { receiver_id: receiverId },
            success: function(response) {
                $('#chatContent').html(response); // Replace chat content with the latest messages
                // Scroll to bottom to focus on the last message
                setTimeout(scrollToBottom, 100); // Delay to ensure content is fully loaded
            }
        });
    }

    // Function to append a new message to the chat content
    function appendMessage(message, messageClass) {
        const messageHtml = `
            <div class="chat-message-wrapper">
                <div class="chat-message ${messageClass}">
                    ${htmlspecialchars(message)}
                </div>
            </div>
        `;
        $('#chatContent').append(messageHtml); // Append the new message
        // Scroll to bottom to focus on the last message
        setTimeout(scrollToBottom, 100); // Delay to ensure content is fully loaded
    }

    // Helper function to escape HTML entities
    function htmlspecialchars(str) {
        return $('<div>').text(str).html();
    }

    // Function to scroll chat content to the bottom
    function scrollToBottom() {
        const chatContent = $('#chatContent');
        chatContent.scrollTop(chatContent[0].scrollHeight);
    }

    // Periodically update the chat list
    setInterval(fetchChatList, chatListUpdateInterval);
    
    // Initial fetch of chat list
    fetchChatList();
});