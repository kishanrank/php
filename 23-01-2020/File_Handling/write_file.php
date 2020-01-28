<?php 

if(isset($_POST['name']) && !empty($_POST['name'])) {
    $name = $_POST['name'];
    $handle = fopen('name.txt', 'a');
    fwrite($handle, $name."\n");


    echo "Name in the file is : ";
    $readin = file('name.txt');
    foreach ($readin as $data){
        echo $data.",";
    }

}
?>

<form action="write_file.php" method="POST">
<input type="text" name="name"><br><br>
<input type="submit">


</form>