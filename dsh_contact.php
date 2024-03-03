<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/dsh_contact.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
</head>

<body>
    <div class="home">
        <a class="hme" href="index.php">Home</a>
    </div>

    <h2>Contact Details</h2>

    <div class="contact_details">
        <table>
            <tr>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Location</th>
            </tr>
            <?php

            include 'connect.php';

            // Adding a Contact
            if (isset($_POST['add_contact'])) {
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $location = $_POST['location'];

                $sql = "INSERT INTO contact_details_table (phone, email, location) VALUES ('$phone', '$email', '$location')";
                if ($connection->query($sql) === TRUE) {
                    echo "<script>alert('New contact added successfully'); window.location.href='dsh_contact.php';</script>";
                    exit;
                } else {
                    echo "<script>alert('Add contact Failed'); window.location.href='dsh_contact.php';</script>";
                    exit;
                }
            }

            // Deleting a Contact
            if (isset($_POST['delete_contact'])) {
                $delete_email = $_POST['delete_email'];

                $sql = "DELETE FROM contact_details_table WHERE email='$delete_email'";
                if ($connection->query($sql) === TRUE) {
                    echo "<script>alert('Contact deleted successfully'); window.location.href='dsh_contact.php';</script>";
                    exit;
                } else {
                    echo "<script>alert('Contact deletion Failed'); window.location.href='dsh_contact.php';</script>";
                    exit;
                }
            }

            // Updating a Contact
            if (isset($_POST['update_contact'])) {
                $prev_email = $_POST['prev_email'];
                $update_phone = $_POST['update_phone'];
                $update_email = $_POST['update_email'];
                $update_location = $_POST['update_location'];

                $sql = "UPDATE contact_details_table SET phone='$update_phone', email='$update_email', location='$update_location' WHERE email='$prev_email'";
                if ($connection->query($sql) === TRUE) {
                    echo "<script>alert('New contact updated successfully'); window.location.href='dsh_contact.php';</script>";
                    exit;
                } else {
                    echo "<script>alert('New contact update Failed'); window.location.href='dsh_contact.php';</script>";
                    exit;
                }
            }


            $sql = "SELECT * FROM contact_details_table";
            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phone"] . "</td>
                <td>" . $row["location"] . "</td>
                </tr>";
                }
            } else {
                echo "0 results";
            }

            $connection->close();
            ?>
        </table>

    </div>

    <h2>Add New Contact</h2>
    <form action="" method="post">
        <label for="phone">Phone Number</label><br>
        <input type="text" name="phone" required><br>

        <label for="email">Email</label><br>
        <textarea name="email" required></textarea><br>

        <label for="location">Location</label><br>
        <input type="text" name="location" required><br>

        <input type="submit" name="add_contact" value="Add Contact">
    </form>

    <h2>Delete Contact</h2>
    <form action="" method="post">
        <label for="delete_email">Enter given Email to delete contact:</label><br>
        <input type="text" id="delete_name" name="delete_email" required><br>
        <input type="submit" name="delete_contact" value="Delete Contact">
    </form>

    <h2>Update Contact</h2>
    <form action="" method="post">

        <label for="prev_email">Previous Email:</label><br>
        <input type="text" id="prev_email" name="prev_email" required><br>

        <label for="update_phone">New Phone Number:</label><br>
        <input type="text" id="update_phone" name="update_phone" required><br>

        <label for="update_email">New Email:</label><br>
        <input type="text" id="update_email" name="update_email" required><br>

        <label for="update_location">New Location:</label><br>
        <input type="text" id="update_location" name="update_location" required><br>

        <input type="submit" name="update_contact" value="Update Contact">
    </form>


</body>

</html>