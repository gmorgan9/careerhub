<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $payload = json_encode([
        "text" => "New message from your website:\n*Full Name:* $fullName\n*Email:* $email\n*Subject:* $subject\n*Message:* $message"
    ]);

    $webhookURL = 'https://hooks.slack.com/services/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'; // Replace with your new Slack webhook URL

    $ch = curl_init($webhookURL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Get response back

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($response === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }

    if ($http_code != 200) {
        die('Slack API responded with status code ' . $http_code . ': ' . $response);
    }

    curl_close($ch);

    echo "Message sent successfully!";
} else {
    echo "Invalid request method.";
}
?>
