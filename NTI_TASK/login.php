<?php
require_once 'includes/db.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $userPass = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email'";

    $stmt = $pdo->query($query);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($userPass, $user['password'])) {

        $_SESSION['id'] = $user['id'];
        $_SESSION['fullName'] = $user['fullName'];
        $_SESSION['email'] = $user['email'];

        header("Location: profile.php");
        exit();

    } else {
        echo "Invalid email or password";
    }
}
?>

<form method="POST">

    <input type="email" name="email" placeholder="Write Email"><br><br>

    <input type="password" name="password" placeholder="Write Password"><br><br>

    <button type="submit">Login</button>

</form>

<p>
    Don't have an account?
    <a href="add-users.php">Register</a>
</p>

<?php
include 'includes/footer.php';
?>