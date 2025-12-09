<?php
$errors = [];
$preview = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST["name"]);
    $age   = trim($_POST["age"]);
    $lang  = trim($_POST["language"]);

    if ($name === "")  $errors[] = "Name is required.";
    if ($age === "")   $errors[] = "Age is required.";
    if ($lang === "")  $errors[] = "Favorite language is required.";

    if (empty($errors)) {
        $preview = [
            "name" => htmlspecialchars($name),
            "age"  => htmlspecialchars($age),
            "lang" => htmlspecialchars($lang)
        ];
    }
}
?>
<form method="post">
    <label>Name:</label>
    <input type="text" name="name"><br><br>

    <label>Age:</label>
    <input type="number" name="age"><br><br>

    <label>Favorite Programming Language:</label>
    <input type="text" name="language"><br><br>

    <button type="submit">Preview</button>
</form>

<?php
if (!empty($errors)) {
    foreach ($errors as $e) {
        echo "<p style='color:red;'>$e</p>";
    }
}

if ($preview) {
    echo "<h3>User Info Preview</h3>";
    echo "<p>Name: {$preview['name']}</p>";
    echo "<p>Age: {$preview['age']}</p>";
    echo "<p>Favorite Language: {$preview['lang']}</p>";
}
?>
