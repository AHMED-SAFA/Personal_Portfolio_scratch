<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
    <link rel="stylesheet" href="./css/project.css">
</head>

<body>
    <div class="home">
        <a class="hme" href="index.php">Home</a>
        <a class="hme" href="skill.php">Skills</a>
    </div>
    <div class="head">
        <h1>My Projects</h1>
    </div>
    <div class="project-container">
        <?php
        include 'connect.php';
        $sql = "SELECT * FROM portfolio";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="project">';
                echo '<img src="' . $row['image'] . '" alt="><br>';
                echo '<div style="display:block;"><h3>' . $row['name'] . '</h3>';
                echo '<p>' . $row['details'] . '</p>';
                echo '<a target="_blank" href="' . $row['link'] . '">View Project</a></div>';
                echo '</div>';
            }
        } else
            echo 'No projects found.';

        mysqli_close($connection);
        ?>
    </div>
</body>

</html>