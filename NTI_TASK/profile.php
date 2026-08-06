<?php
require_once 'includes/db.php';
include 'includes/header.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fname'])) {

    $fullName = $_POST['fname'];

    $query = "UPDATE users SET fullName = :fullName WHERE id = :id";

    $stmt = $pdo->prepare($query);

    $stmt->execute([
        ':fullName' => $fullName,
        ':id' => $_SESSION['id']
    ]);

    $_SESSION['fullName'] = $fullName;

    echo "User modified successfully";
}
?>

<h2>Welcome <?php echo $_SESSION['fullName']; ?></h2>

<p><b>ID:</b> <?php echo $_SESSION['id']; ?></p>

<p><b>Email:</b> <?php echo $_SESSION['email']; ?></p>

<form method="POST">

    <input
        type="text"
        name="fname"
        value="<?php echo $_SESSION['fullName']; ?>">

    <br><br>

    <button type="submit">Update</button>

</form>

<br>

<form action="logout.php" method="POST">

    <button type="submit">Logout</button>

</form>

<?php
include 'includes/footer.php';
?>
