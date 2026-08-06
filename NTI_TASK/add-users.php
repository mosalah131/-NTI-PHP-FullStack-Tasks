<?php
require_once 'includes/db.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullName = $_POST['fname'];
    $email = $_POST['email'];
    $userPass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (fullName, email, password)
              VALUES (:fullName, :email, :password)";

    $stmt = $pdo->prepare($query);

    $stmt->execute([
        ':fullName' => $fullName,
        ':email' => $email,
        ':password' => $userPass
    ]);

    if ($stmt) {
        echo "User added successfully";
    } else {
        echo "Something went wrong";
    }
}
?>

<form method="POST">

    <input type="text" name="fname" placeholder="Write Full Name">
    <br><br>

    <input type="email" name="email" placeholder="Write Email">
    <br><br>

    <input type="password" name="password" placeholder="Write Password">
    <br><br>

    <button type="submit">Register</button>

</form>

<p>
    Already have an account?
    <a href="login.php">Login</a>
</p>

<?php
include 'includes/footer.php';
?>