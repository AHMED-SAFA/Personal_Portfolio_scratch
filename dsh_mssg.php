<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/dsh_mssg.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
</head>

<body>
    <div class="home">
        <a class="hme" href="index.php">Home</a>
    </div>
    <div class="head">
        <h2>Message for Safa</h2>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
            <?php

            // Fetch data from database
            $sql = "SELECT * FROM send_message_table";
            if ($result = $connection->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['subject'] . "</td>";
                        echo "<td>" . $row['message'] . "</td>";
                        echo "<td><form method='post'><input type='hidden' name='message_id' value='" . $row['message_id'] . "'><button type='submit' name='delete' class='delete-btn'>Delete</button></form></td>";
                        echo "</tr>";
                    }
                    $result->free();
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
            } else
                echo "ERROR: Could not able to execute $sql. " . $connection->error;

            // Delete message if delete button is clicked
            if (isset($_POST['delete'])) {
                $message_id = $_POST['message_id'];
                $sql_delete = "DELETE FROM send_message_table WHERE message_id=$message_id";
                if ($connection->query($sql_delete) === TRUE) {
                    echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    echo "Error deleting record: " . $connection->error;
                }
            }
            // Close connection
            $connection->close();
            ?>
        </table>
    </div>


</body>

</html>