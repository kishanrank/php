<?php 

if(isset($_POST['password'])){
    $password = md5($_POST['password']);
    
    $filename = 'md5.txt';
    $handle = fopen($filename, 'r');
    $password_file = fread($handle, filesize($filename));

    if($password == $password_file) {
        echo "password matched!!!".'<br>';
    }else {
        echo "password not found!!".'<br>';
    }
}

?>
<form action="md5_example.php" method="POST">

Enter Password : <br><br>
<input type="password" name="password"><br><br>
<input type="submit">

</form>