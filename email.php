<?php
$emailMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $posAt = strpos($email, "@");
    $posDot = strrpos($email, ".");

    if ($posAt === false || $posDot === false || $posAt === 0) {
        $emailMessage = "Email format incorrect (basic check).";
    } else {
        $emailMessage = "Email format looks ok (basic check).";
    }
}
?>
<form method="post">
    <label>Enter email:</label>
    <input type="text" name="email" required>
    <button type="submit">Check</button>
</form>

<?php
if ($emailMessage !== "") {
    echo "<p>$emailMessage</p>";
}
?>
