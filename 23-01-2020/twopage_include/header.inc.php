<?php

echo $_SERVER['HTTP_HOST'];
$script_name = $_SERVER['SCRIPT_NAME'];
?>
    

<form action="<?php echo $script_name; ?>" method="post">

<input type="submit" name="submit" value="Submit">

</form>