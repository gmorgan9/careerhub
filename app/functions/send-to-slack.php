<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $payload = json_encode([
        "text" => "New message from your website:\n*Full Name:* $fullName\n*Email:* $email\n*Subject:* $subject\n*Message:* $message"
    ]);

    $webhookURL = 'https://hooks.slack.com/services/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'; // Replace with your Slack webhook URL

    $ch = curl_init($webhookURL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    curl_close($ch);

    echo "Message sent successfully!";
} else {
    echo "Invalid request method.";
}
?>
