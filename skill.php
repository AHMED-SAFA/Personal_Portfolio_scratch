<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/skillpg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahmed's Skills</title>
</head>

<body>

    <div class="container2">
        <nav class="navBar">
            <div class="elements">
                <a class="SF" href="index.php"><span class="safa">S </span>F</a>
                <ul class="items">
                    <li class="hideOnMobile"><a href="index.php">Home</a></li>
                    <li class="hideOnMobile"><a href="project.php">Projects</a></li>
                    <li class="hideOnMobile"><a href="contact.php">Contact</a></li>
                    <li class="menu_hamburger" onclick=showHam()><a href="#"><i class="fa-solid fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="items side_bar">
                    <li onclick=hideSidebar()><a href="#"><i class="fa-sharp fa-solid fa-xmark"></i></a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="project.php">Projects</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
        <h1>My CSE based language skills</h1>
        <div class="containerskill">
            <div class="card">
                <div class="percentage" style="--clr:#04fc43;--num:95">
                    <div class="dot"></div>
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>
                    <div class="amount">
                        <h2>95%</h2>
                        <h3>C</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="percentage" style="--clr:blue;--num:80">
                    <div class="dot"></div>
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>
                    <div class="amount">
                        <h2>80%</h2>
                        <h3>Java</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="percentage" style="--clr:red;--num:90">
                    <div class="dot"></div>
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>
                    <div class="amount">
                        <h2>90%</h2>
                        <h3>C++</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="percentage" style="--clr:gold;--num:80">
                    <div class="dot"></div>
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>
                    <div class="amount">
                        <h2>80%</h2>
                        <h3>PYTHON</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="percentage" style="--clr:silver;--num:70">
                    <div class="dot"></div>
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>
                    <div class="amount">
                        <h2>70%</h2>
                        <h3>CSS</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="percentage" style="--clr:#e713b9;--num:70">
                    <div class="dot"></div>
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>
                    <div class="amount">
                        <h2>70%</h2>
                        <h3>HTML</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="percentage" style="--clr:#0cece1;--num:65">
                    <div class="dot"></div>
                    <svg>
                        <circle cx="70" cy="70" r="70"></circle>
                        <circle cx="70" cy="70" r="70"></circle>
                    </svg>
                    <div class="amount">
                        <h2>65%</h2>
                        <h3>JavaScript</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <button id="upButton" title="Go to top">↑</button>

    <div class="download-cv-container">
        <button id="dwbtn">Download CV</button>
    </div>

    <script src="./JS/hamburger.js"></script>
    <script src="./JS/dynamic_upButton.js"></script>
    <script src="./JS/cv_download.js"></script>
</body>

</html>