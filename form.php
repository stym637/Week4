<?php
$message = "";
$color   = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = trim($_POST["full_name"]);
    $email    = trim($_POST["email"]);

    if ($fullName === "" || $email === "") {
        $message = "Please fill in all required fields.";
        $color   = "red";
    } else {
        $message = "All good!";
        $color   = "green";
    }
}
?>
<form method="post">
    <label>Full Name:</label>
    <input type="text" name="full_name"><br><br>

    <label>Email:</label>
    <input type="text" name="email"><br><br>

    <button type="submit">Submit</button>
</form>

<?php
if ($message !== "") {
    echo "<p style='color:$color;'>$message</p>";
}
?>
