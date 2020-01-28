<?php 

if(isset($_POST['date']) && isset($_POST['month'])){
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    if(!empty($date) && !empty($month) && !empty($year) && $date<=30) {
        echo "Today's date is ".$date.'-'.$month.'-'.$year;
    }else {
        echo "Please enter data in all feilds";
    }
}
?>

<form action="post_examle.php" method="POST">

Date : <br>
<input type="text" name="date" ><br><br>
Month : <br>
<input type="text" name="month" ><br><br>
Year : <br>
<input type="text" name="year"> <br><br>
<input type="submit" name="submit" value="Submit">
</form>