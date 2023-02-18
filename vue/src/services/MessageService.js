export const messageService = {
    getMessages: function() {
        return fetch('http://127.0.0.1:8000/message/list')
            .then(response => response.json())
            .then(data => {
                return data.messages
            })
            .catch(error => {
                console.error(error);
                return [];
            });
    },
    sendMessage: function(message) {
        return fetch('http://127.0.0.1:8000/message/create', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: message
        })
            .then(response => response.json())
            .then(data => {
                return data;
            })
            .catch(error => {
                console.error(error);
                return null;
            });
    }
};