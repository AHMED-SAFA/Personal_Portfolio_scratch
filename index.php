<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- logo font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <!-- ---------------- -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahmed Safa</title>
</head>

<body>
    <header class="header_sec">
        <div class="container">
            <nav class="navBar">
                <div class="elements">
                    <a class="SF" href="index.html"><span class="safa">S </span>F</a>
                    <ul class="items">
                        <li class="hideOnMobile"><a href="index.php">Home</a></li>
                        <li class="hideOnMobile"><a href="contact.php">Contact</a></li>
                        <li class="hideOnMobile"><a href="skill.php">Skills</a></li>
                        <li class="hideOnMobile"><a href="project.php">Projects</a></li>
                        <li class="hideOnMobile"><a href="sports.php">Sports</a></li>
                        <li class="hideOnMobile"><a class="btnnavbars" href="#about">About</a></li>
                        <li class="hideOnMobile"><a href="login.php">Admin</a></li>
                        <li class="menu_hamburger" onclick=showHam()><a href="#"><i class="fa-solid fa-bars"></i></a>
                        </li>
                    </ul>
                    <ul class="items side_bar">
                        <li onclick=hideSidebar()><a href="#"><i class="fa-sharp fa-solid fa-xmark"></i></a></li>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="skill.php">Skills</a></li>
                        <li><a href="project.php">Projects</a></li>
                        <li><a href="sports.php">Sports</a></li>
                        <li><a class="btnnavbars" href="#about">About</a></li>
                        <li><a href="login.php">Admin</a></li>
                    </ul>
                </div>
            </nav>
            <div class="header_contents">
                <div id="namediv" class="otherWords">
                    <p>Assalamu Alaikum</p>
                    <h1>I'm <span class="safa">Ahmed Nur E Safa</span></h1>
                    <p class="lead"> Engineer | CSE Student | Learner </p>
                    <a href="#about" class="btn">About Me</a>
                </div>
                <div class="socials">
                    <ul class="social_links"><a target="_blank" href="https://www.facebook.com/profile.php?id=100079941048298"><i class="fa-brands fa-facebook-f fa-3x" style="color: white;"></i></a></ul>
                    <ul class="social_links"><a target="_blank" href="https://github.com/AHMED-SAFA"><i class="fa-brands fa-github fa-3x" style="color: white;"></i></a></ul>
                    <ul class="social_links"><a target="_blank" href="https://www.linkedin.com/in/ahmedsafa114/"><i class="fa-brands fa-linkedin-in fa-3x" style="color: white"></i></a></ul>
                </div>
            </div>
        </div>
    </header>

    <section id="about" class="aboutInfo">
        <div class="container2">
            <div class="infos">
                <h1>About Me</h1>
                <div class="intro">
                    <div class="leftSide">
                        <?php
                        $res = mysqli_query($connection, "SELECT* from image_table ORDER by id DESC");
                        while ($row = mysqli_fetch_array($res)) {
                            echo '<img src="uploads/' . $row['image'] . '">';
                        } ?>
                        <!-- <img src="./images/profile image.jpg"> -->
                    </div>
                    <div class="rightSide">
                        <h2 style="color: rgb(46, 233, 239);">I am SAFA</h2>
                        <h3 style="font-size: 30px;margin-bottom: 20px;"><span style="color: rgb(46, 233, 239);" class="txt-type" data-wait="2000" data-words='["Engineer","Programmer","Developer","Learner"]'></span>
                        </h3>
                        <p>I am 3rd year student at KUET CSE.
                            I always try to explore new and trending technologies, also would love
                            to learn and expertise on them. </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Up button -->
        <button id="upButton" title="Go to top">↑</button>
    </section>

    <footer class="footClass">
        <p>© Copyright 2023 - Ahmed Nur E Safa</p>
    </footer>

    <script src="./JS/dynamic_upButton.js"></script>
    <script src="./JS/hamburger.js"></script>
    <script src="./JS/typescript.js"></script>
    <!-- pageAnimation related jquery link -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./JS/pageAnimation.js"></script>
    <!-- ---------------------------- -->
</body>

</html>