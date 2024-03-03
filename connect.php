<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "portfolio_web");

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);

if (!$connection) die("DB Not Connected");
