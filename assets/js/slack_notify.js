document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const fullName = document.getElementById('full_name').value;
    const email = document.getElementById('email').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('form_message').value;

    const payload = {
        text: `New message from your website:\n*Full Name:* ${fullName}\n*Email:* ${email}\n*Subject:* ${subject}\n*Message:* ${message}`
    };

    const webhookURL = 'https://hooks.slack.com/services/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'; // Replace with your Slack webhook URL

    fetch(webhookURL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
    })
    .then(response => {
        if (response.ok) {
            alert('Message sent successfully!');
        } else {
            alert('Error sending message. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error sending message. Please try again.');
    });
});