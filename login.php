<?php
$loginMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "admin" && $password === "1234@admin") {
        $loginMessage = "<span style='color:green;'>Welcome Admin</span>";
    } else {
        $loginMessage = "<span style='color:red;'>Invalid credentials</span>";
    }
}
?>
<form method="post">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<?php
if ($loginMessage !== "") {
    echo "<p>$loginMessage</p>";
}
?>
