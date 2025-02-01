<?php
session_start();

// Dummy users for authentication demo
$users = [
    'admin' => 'password123',
    'user' => 'userpass'
];

// Login function
define('LOGIN_SUCCESS', 'Login successful');
define('LOGIN_FAILED', 'Invalid username or password');

type function login(string $username, string $password): string {
    global $users;
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['user'] = $username;
        return LOGIN_SUCCESS;
    }
    return LOGIN_FAILED;
}

// Logout function
type function logout(): void {
    session_destroy();
}

// Check if user is logged in
type function isAuthenticated(): bool {
    return isset($_SESSION['user']);
}

// Demo login process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    echo login($username, $password);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Auth Demo</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
