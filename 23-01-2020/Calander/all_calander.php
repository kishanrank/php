<form action="calander.php" method="POST">
    Enter a Start Month : <input type="number" name="month_start"> <br><br>
    Enter a Last Month : <input type="number" name="month_end"> <br><br>
    Enter a year : <input type="text" name="year"> <br><br>
    <input type="submit" value="Display calander">
</form>

<?php

session_start();


if (isset($_POST['month_start']) && isset($_POST['month_end']) && isset($_POST['year'])) {
    $user_month_start = $_POST['month_start'];
    $user_month_end = $_POST['month_end'];
    $user_year = $_POST['year'];
}
for($k=$user_month_start; $k<=$user_month_end; $k++) {
    calender($user_month_start, $year);
    $user_month_start++;

}

function calender($month,$year){
$days = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
$table = "<table style='border: 1px solid black'><tr style='border: 1px solid black'><td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td></tr>";

$number = cal_days_in_month(CAL_GREGORIAN, $month, $year);

for ($i = 1; $i <= $number; $i++) {
    $time_stamp = strtotime($year . "-" . $month . "-" . $i);
    $day = date('D', $time_stamp);
    if ($i == 1) {
        $boolean = false;
    }
    for ($j = 0; $j < 7; $j++) {
        if ($i == 1 && $boolean == false) {
            if ($day == $days[$j]) {
                if ($day == 'Sun') {
                    $table = $table . "<tr>";
                    $table = $table . "<td>" . $i . "</td>";
                    $boolean = true;
                } elseif ($day == 'Sat') {
                    $table = $table . "<td>" . $i . "</td>";
                    $table = $table . "</tr>";
                    $boolean = true;
                } else {
                    $table = $table . "<td>" . $i . "</td>";
                    $boolean = true;
                }
            } else {
                $table = $table . "<td></td>";
            }
        } else {
            if ($day == $days[$j]) {
                if ($day == 'Sun') {
                    $table = $table . "<tr>";
                    $table = $table . "<td>" . $i . "</td>";
                } elseif ($day  == 'Sat') {
                    $table = $table . "<td>" . $i . "</td>";
                    $table = $table . "</tr>";
                } else {
                    $table = $table . "<td>" . $i . "</td>";
                }
            }
        }
    }
}
$table = $table . "</table>";
echo $table;
}

?>

