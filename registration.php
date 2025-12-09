<?php
$regErrors = [];
$previewData = null;
$strength = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = trim($_POST["name"]);
    $email    = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm  = $_POST["confirm"];

    if ($name === "")  $regErrors[] = "Name is required.";
    if ($email === "") $regErrors[] = "Email is required.";
    if ($password === "") $regErrors[] = "Password is required.";
    if ($confirm === "")  $regErrors[] = "Confirm Password is required.";
    if ($password !== "" && $confirm !== "" && $password !== $confirm) {
        $regErrors[] = "Passwords do not match.";
    }

    if (empty($regErrors)) {
        $strength = (strlen($password) >= 8) ? "Strong" : "Weak";

        $previewData = [
            "name"  => htmlspecialchars($name),
            "email" => htmlspecialchars($email)
        ];
    }
}
?>
<form method="post">
    <label>Name:</label>
    <input type="text" name="name"><br><br>

    <label>Email:</label>
    <input type="text" name="email"><br><br>

    <label>Password:</label>
    <input type="password" name="password"><br><br>

    <label>Confirm Password:</label>
    <input type="password" name="confirm"><br><br>

    <button type="submit">Register</button>
</form>

<?php
if (!empty($regErrors)) {
    foreach ($regErrors as $e) {
        echo "<p style='color:red;'>$e</p>";
    }
}

if ($previewData) {
    echo "<h3>Registration Preview</h3>";
    echo "<p>Name: {$previewData['name']}</p>";
    echo "<p>Email: {$previewData['email']}</p>";
    echo "<p>Password Strength: $strength</p>";
}
?>
