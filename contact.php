<?php
// Enable error reporting to see PHP errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Debugging statement to log the request method
error_log("Request Method: " . $_SERVER['REQUEST_METHOD']);
?>


<?php
session_start();

// Validate the CSRF token
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the CSRF token in the form matches the one stored in the session
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        // The CSRF token is valid; continue processing the form
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        $to = "your@email.com"; // Replace with your email address
        $subject = "Message from $name";
        $headers = "From: $email";

        try {
            mail($to, $subject, $message, $headers);
            echo "Message sent successfully!";
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    } else {
        echo "CSRF token validation failed. This may be a malicious request.";
    }
}
?>











<?php
session_start();

// Generate a random CSRF token and store it in a session variable
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generates a 64-character token
}

?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $to = "princekumarbusiness12@gmail.com"; // Replace with your email address
    $subject = "Message from $name";
    $headers = "From: $email";

    try {
        mail($to, $subject, $message, $headers);
        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
