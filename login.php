<?php
session_start();

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=mydb', 'username', 'password');

// Check if the user submitted the login form
if (isset($_POST['submit'])) {
    // Get the user's email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate the user's email and password
    $stmt = $db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Set the user's session
        $_SESSION['user'] = $user;

        // Redirect to the admin panel
        header('Location: admin.php');
        exit;
    } else {
        // Display an error message
        $error = 'Invalid email or password';
    }
}
?>

<!-- Display the login form -->
<form method="post">
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit" name="submit">Login</button>

    <?php if (isset($error)): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
</form>
