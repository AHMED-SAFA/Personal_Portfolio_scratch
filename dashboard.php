<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/dashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Option</title>
</head>

<body>
    <div class="head">
        <h1>Dashboard for dynamic mysql</h1>
    </div>

    <div class="row">
        <div class="column">
            <div class="card">
                <h3>Edit Projects</h3>
                <p>You can Edit(ADD/DELETE/UPDATE) your project from here.</p>
                <button id="edit_project_Button">Edit Project</button>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <h3>Edit Contact</h3>
                <p>You can edit your contact info from here.</p>
                <button id="edit_contact_Button">Edit Contact</button>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <h3>Edit Profile Picture</h3>
                <p>You can edit your profile picture from here.</p>
                <button id="edit_dp_Button">Edit Profile Picture</button>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <h3>Messages</h3>
                <p>Your messages are shown here.You can delete them.</p>
                <button id="show_mssg_Button">Show Message</button>
            </div>
        </div>
    </div>
    <!-- logount -->
    <div class="logout">
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <script>
        document.getElementById("edit_project_Button").addEventListener("click", function() {
            window.location.href = "dsh_project.php";
        });
        document.getElementById("edit_contact_Button").addEventListener("click", function() {
            window.location.href = "dsh_contact.php";
        });
        document.getElementById("edit_dp_Button").addEventListener("click", function() {
            window.location.href = "dsh_dp.php";
        });
        document.getElementById("show_mssg_Button").addEventListener("click", function() {
            window.location.href = "dsh_mssg.php";
        });
    </script>
</body>


</html>