<form method="post">
    <label>Enter a sentence:</label><br>
    <textarea name="sentence" rows="3" cols="40" required></textarea><br>
    <button type="submit">Count Vowels</button>
</form>
<?php
$sentence = "";
$count = null;
if (isset($_POST['sentence'])) {
    $sentence = strtolower($_POST['sentence']);
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $count = 0;

    for ($i = 0; $i < strlen($sentence); $i++) {
        if (in_array($sentence[$i], $vowels)) {
            $count++;
        }
    }
}

if ($count !== null) {
    echo "Number of vowels: $count";
}
?>
