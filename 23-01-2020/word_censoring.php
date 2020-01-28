<?php 

//$find = array('kishan', 'rajnik','tej');
//$replace = array('k****n','r****k','t*j');

$offset = 0;

if(isset($_POST['textarea']) &&  isset($_POST['search']) && isset($_POST['replace'])){
    $textarea = $_POST['textarea'];
    $search = $_POST['search'];
    $replace = $_POST['replace'];
    $search_length = strlen($search);

    if(!empty($text) && !empty($search) && !empty($replace)) {

        while($strpos = strpos($text, $search, $offset)) {
            echo $strpos;
            echo $offset = $strpos + $search_length;

        }
    }else {
        echo "error";
    }
}
?>

<form action="word_censoring.php" method="post">

<textarea rows="6" cols="30" name="textarea"></textarea><br><br>
Search: <input type="text" name="search"><br><br>
Replace: <input type="text" name="replace"><br><br>
<input type="submit" value="Find and Replace">

</form>