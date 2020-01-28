<?php 

if(isset($_GET['date']) && isset($_GET['month'])){
    $date = $_GET['date'];
    $month = $_GET['month'];
    $year = $_GET['year'];

    if(!empty($date) && !empty($month) && !empty($year) && $date<=30) {
        echo "Today's date is ".$date.'-'.$month.'-'.$year;
    }else {
        echo "Please enter data in all feilds";
    }
}


?>

<form action="get_example.php" method="GET">

Date : <br>
<input type="text" name="date" ><br><br>
Month : <br>
<input type="text" name="month" ><br><br>
Year : <br>
<input type="text" name="year"> <br><br>
<input type="submit" name="submit" value="Submit">
</form>