<?php
$users = [
    ["email" => "satyam@gmail.com"],
    ["email" => "sattu@gmail.com"],
    ["email" => "stym637@gmail.com"]
];

$msgEmail = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newEmail = trim($_POST["new_email"]);
    $exists = false;

    foreach ($users as $user) {
        if ($user["email"] === $newEmail) {
            $exists = true;
            break;
        }
    }

    if ($exists) {
        $msgEmail = "Email already exists";
    } else {
        $msgEmail = "Email available";
    }
}
?>
<form method="post">
    <label>Enter email to check:</label>
    <input type="text" name="new_email" required>
    <button type="submit">Check</button>
</form>

<?php
if ($msgEmail !== "") {
    echo "<p>$msgEmail</p>";
}
?>
