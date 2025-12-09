<form method="POST">
    Enter a word:<input type="text" name="word">
    <button>Reverse</button>
</form>

<?php
if(isset($_POST['word'])){
    $str = $_POST['word'];
    $reversed ="";
   for($i=strlen($str)-1; $i>=0; $i--){
       $reversed .= $str[$i];
   }
   echo "Reversed Word: " . $reversed; 
}