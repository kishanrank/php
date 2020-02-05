<?php
include 'connection.php';

function getAllData_html()
{
    global $mysqli;
    $sql = "SELECT id,name, mobile FROM table_1";
    $resultset = $mysqli->query($sql);
    if ($resultset->num_rows > 0) {
?>
        <table border="1">
            <tr>
                <td>Name</td>
                <td>Mobile</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <?php
            while ($row = $resultset->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["mobile"]; ?></td>
                    <td><a href="#" onclick="getsinglerecord('<?php echo  $row["id"]; ?>')">Edit</a></td>
                    <td><a href="#" onclick="deleterecord('<?php echo  $row["id"]; ?>')">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table><?php
            } else {
                echo "0 Results Found!!";
            }
            $mysqli->close();
        }

        function insertContent()
        {
            global $mysqli;
            $name = "";
            $mobile = "";
            if (isset($_POST["name"]) && isset($_POST["mobile"])) {
                $name = $_POST["name"];
                $mobile = $_POST["mobile"];
            }

            $sql = "INSERT INTO table_1 (name, mobile) VALUES ('$name', '$mobile')";
            $mysqli->query($sql);

            $mysqli->close();
        }
        function deleteData()
        {
            global $mysqli;
            $id = 0;
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
            }
            $sql = "DELETE FROM table_1 where id='" . $id . "'";
            $mysqli->query($sql);
            $mysqli->close();
        }



        $action = "";
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
        }
        if ($action == "addRecord") {
            insertContent();
        }
        if ($action == "getAllRecords") {
            getAllData_html();
        }
        if ($action == "deleteRecord") {
            deleteData();
        }
?>