<?php include 'connection.php';
$sql = "SELECT id, name, mobile FROM table_1";
$resultset = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script language="javascript">
        function getAllRecords() {
            jQuery(document).ready(function($) {
                $.ajax({
                    method: "POST",
                    url: "ajax.php",
                    data: {
                        action: "getAllRecords"
                    }
                }).done(function(data) {
                    $("#tabledata").html(data);
                });
            });
        }

        function insertContent() {
            jQuery(document).ready(function($) {
                var name = $("#txtAddName").val();
                var mobile = $("#txtAddMobile").val();

                if (name == "") {
                    $("#add_record_mess").html("Please enter your name");
                    return;
                }
                if (mobile == "") {
                    $("#add_record_mess").html("Please enter your number");
                    return;
                }
                if (mobile.length > 10) {
                    $("#add_record_mess").html("Please enter your valid number");
                    return;
                }
                $.ajax({
                    method: "POST",
                    url: "ajax.php",
                    data: {
                        name: name,
                        mobile: mobile,
                        action: "addRecord"
                    }
                }).done(function(data) {
                    alert("Sucessfully data added");
                    $("#txtAddName").val("");
                    $("#txtAddMobile").val("");
                    $("#frmAdd").fadeOut();
                });
            });
        }

        function deleterecord(tableid) {
            jQuery(document).ready(function($) {

                $.ajax({
                    method: "POST",
                    url: "ajax.php",
                    data: {
                        id: tableid,
                        action: "deleteRecord"
                    }
                }).done(function(data) {
                    alert("Data deleted sucessfully.");
                    getAllRecords();
                });
            });
        }


        function showForm() {
            jQuery(document).ready(function($) {
                $("#frmAdd").fadeIn();
            });
        }
    </script>

</head>

<body>
    <div id="display_data">
        <table id="tabledata" border="1">
            <tr>
                <td>Name</td>
                <td>Mobile</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <?php
            while ($row = $resultset->fetch_assoc()) {
                //echo "name: " . $row["name"]. " - mobile: " . $row["mobile"];
            ?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["mobile"]; ?></td>
                    <td><a href="#" onclick="getsinglerecord('<?php $row['id']; ?>')">Edit</a></td>
                    <td><a href="#" onclick="deleterecord('<?php $row['id']; ?>')">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div id="add-data">
        <a href="#" onclick="showForm()">Add Record</a>
        <form id="frmAdd" name="add_form" style="display: none">
            <h3>Add Record</h3>
            <div id="response_data"></div>
            <div id="add_record_mess"></div>
            <table>
                <tr>
                    <td>Name :</td>
                    <td><input type="text" name="txtAddName" id="txtAddName" value="" /></td>
                </tr>

                <tr>
                    <td>Number :</td>
                    <td><input type="text" name="txtAddMobile" id="txtAddMobile" value="" /></td>
                </tr>
                <tr>
                    <td><input type="button" onclick="insertContent()" name="txtAddSubmit" id="txtAddSubmit" value="Submit" /></td>
                </tr>
            </table>
        </form>
        </div>
</body>

</html>