<?php
$passErrors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = $_POST["password"];

    if (strlen($password) < 8) {
        $passErrors[] = "Minimum 8 characters required.";
    }
    if (!preg_match("/[0-9]/", $password)) {
        $passErrors[] = "Must include at least one number.";
    }
    if (!preg_match("/[\W_]/", $password)) {
        $passErrors[] = "Must include at least one special character.";
    }
}
?>
<form method="post">
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Validate</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($passErrors)) {
        echo "<p style='color:green;'>Password meets all rules.</p>";
    } else {
        foreach ($passErrors as $e) {
            echo "<p style='color:red;'>$e</p>";
        }
    }
}
?>
