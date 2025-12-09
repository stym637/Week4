<?php
$result = null;
$errorCalc = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $a = (float)$_POST["a"];
    $b = (float)$_POST["b"];
    $op = $_POST["operation"];

    switch ($op) {
        case "add":
            $result = $a + $b;
            break;
        case "subtract":
            $result = $a - $b;
            break;
        case "multiply":
            $result = $a * $b;
            break;
        case "divide":
            if ($b == 0) {
                $errorCalc = "Cannot divide by zero.";
            } else {
                $result = $a / $b;
            }
            break;
        default:
            $errorCalc = "Invalid operation.";
    }
}
?>
<form method="post">
    <label>First number:</label>
    <input type="number" step="any" name="a" required><br><br>

    <label>Second number:</label>
    <input type="number" step="any" name="b" required><br><br>

    <label>Operation:</label>
    <select name="operation">
        <option value="add">add</option>
        <option value="subtract">subtract</option>
        <option value="multiply">multiply</option>
        <option value="divide">divide</option>
    </select><br><br>

    <button type="submit">Calculate</button>
</form>

<?php
if ($result !== null) {
    echo "<p>Result: $result</p>";
}
if ($errorCalc !== "") {
    echo "<p style='color:red;'>$errorCalc</p>";
}
?>
