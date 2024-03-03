<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/dsh_proj.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Projects</title>
</head>

<body>

    <div class="home">
        <a class="hme" href="index.php">Home</a>
    </div>

    <h2>Projects</h2>
    <table>
        <tr>
            <th>Project Name</th>
            <th>Project Details</th>
            <th>Image URL</th>
            <th>Project Link</th>
        </tr>
        <?php
        // Database connection
        include 'connect.php';

        // Add Project
        if (isset($_POST['add_project'])) {
            $name = $_POST['name'];
            $details = $_POST['details'];
            $image = $_POST['image'];
            $link = $_POST['link'];

            // -----------------add pic---------------------------------
            $folder = "images/";

            $image_file = $_FILES['image']['name'];

            $file = $_FILES['image']['tmp_name'];
            $path = $folder . $image_file;
            $target_file = $folder . basename($image_file);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            //Allow only JPG, JPEG, PNG & GIF etc formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
            }

            if ($_FILES["image"]["size"] > 1048576) {
                $error[] = 'Sorry, your image is too large. Upload less than 1 MB KB in size.';
            }
            if (!isset($error)) {
                // move image in folder
                move_uploaded_file($file, $target_file);
                if ($result) {
                    header("location:dsh_project.php?image_success=1");
                } else {
                    echo 'Something went wrong';
                }
            }

            // ----------------------------------------------------

            $sql = "INSERT INTO portfolio (name, details, image, link) VALUES ('$name', '$details', '$image', '$link')";

            if (mysqli_query($connection, $sql)) {
                echo "<script>alert('Project Added successfully'); window.location.href='dsh_project.php';</script>";
                exit;
            } else {
                echo "<script>alert('Project Add Failed'); window.location.href='dsh_project.php';</script>";
                exit;
            }
        }
        // Delete Project
        if (isset($_POST['delete_project'])) {
            $name_del = $_POST['delete_name'];

            // Use prepared statement to prevent SQL injection
            $sql = "DELETE FROM portfolio WHERE name = ?";
            $stmt = mysqli_prepare($connection, $sql);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "s", $name_del);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Project deleted successfully'); window.location.href='dsh_project.php';</script>";
                exit;
            } else {
                echo "<script>alert('Delete Project Failed'); window.location.href='dsh_project.php';</script>";
                exit;
            }
            mysqli_stmt_close($stmt);
        }
        // Update Project
        if (isset($_POST['update_project'])) {
            $prev_name = $_POST['prev_name'];
            $name = $_POST['update_name'];
            $details = $_POST['update_details'];
            $image = $_POST['update_image'];
            $link = $_POST['update_link'];

            // -----------------add pic---------------------------------
            $folder = "images/";

            $image_file = $_FILES['image']['name'];

            $file = $_FILES['image']['tmp_name'];
            $path = $folder . $image_file;
            $target_file = $folder . basename($image_file);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            //Allow only JPG, JPEG, PNG & GIF etc formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
            }

            if ($_FILES["image"]["size"] > 1048576) {
                $error[] = 'Sorry, your image is too large. Upload less than 1 MB KB in size.';
            }
            if (!isset($error)) {
                // move image in folder
                move_uploaded_file($file, $target_file);
                if ($result) {
                    header("location:dsh_project.php?image_success=1");
                } else {
                    echo 'Something went wrong';
                }
            }

            // ----------------------------------------------------

            $sql = "UPDATE portfolio SET name='$name', details='$details', image='$image', link='$link' WHERE name='$prev_name'";
            if (mysqli_query($connection, $sql)) {
                echo "<script>alert('Project Update successfully'); window.location.href='dsh_project.php';</script>";
                exit;
            } else {
                echo "<script>alert('Project Update Failed'); window.location.href='dsh_project.php';</script>";
                exit;
            }
        }

        $sql = "SELECT * FROM portfolio";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['details'] . "</td>";
                echo "<td>" . $row['image'] . "</td>";
                echo "<td>" . $row['link'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No projects found</td></tr>";
        }

        $connection->close();
        ?>
    </table>

    <h2>Add New Project</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Project Name:</label><br>
        <input type="text" name="name" required><br>

        <label for="details">Project Details:</label><br>
        <textarea name="details" required></textarea><br>

        <input type="file" name="image" id="image" accept="image/*" required><br>
        <!-- <button type="submit" name="submit">Upload Image</button> -->
        <label for="image">Image Name:</label><br>
        <input type="text" value="./images/" name="image" required><br>

        <label for="link">Project Link:</label><br>
        <input type="text" name="link" required><br>

        <input type="submit" name="add_project" value="Add Project">
    </form>

    <h2>Delete Project</h2>
    <form action="" method="post">
        <label for="delete_name">Enter Project name to delete:</label><br>
        <input type="text" id="delete_name" name="delete_name" required><br>
        <input type="submit" name="delete_project" value="Delete Project">
    </form>

    <h2>Update Project</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="prev_name">Previous Project Name:</label><br>
        <input type="text" id="prev_name" name="prev_name" required><br>

        <label for="update_name">New Project Name:</label><br>
        <input type="text" id="update_name" name="update_name" required><br>

        <label for="update_details">New Project Details:</label><br>
        <textarea id="update_details" name="update_details" required></textarea><br>

        <input type="file" name="image" id="image" accept="image/*" required><br>
        <label for="update_image">New Image name:</label><br>
        <input type="text" value="./images/" id="update_image" name="update_image" required><br>

        <label for="update_link">New Project Link:</label><br>
        <input type="text" id="update_link" name="update_link" required><br>

        <input type="submit" name="update_project" value="Update Project">
    </form>
</body>

</html>