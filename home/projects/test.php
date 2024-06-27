<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Page with Close Button</title>
</head>
<body>

<h2>Your PHP Page Content</h2>

<!-- Close button to close the offcanvas -->
<button onclick="closeOffcanvas()">Close</button>

<script>
function closeOffcanvas() {
    if (window.opener) {
        window.opener.closeOffcanvas();
    }
}
</script>

</body>
</html>
