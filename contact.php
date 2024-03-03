<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	include 'connect.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['say'];

	$stmt = $connection->prepare("INSERT INTO send_message_table (name, email, subject, message) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss", $name, $email, $subject, $message);

	if ($stmt->execute() === TRUE) {
		echo "<script>alert('Your message sent successfully'); window.location.href='contact.php';</script>";
		exit;
	} else
		echo "Error: " . $stmt->error;

	$stmt->close();
	$connection->close();
}
?>

<?php
include 'connect.php';


$sql = "SELECT * FROM contact_details_table";
$result = $connection->query($sql);

$phone = '';
$email = '';
$location = '';

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$phone = $row['phone'];
		$email = $row['email'];
		$location = $row['location'];
	}
} else {
	echo "No details found in the contact_details_table";
}
$connection->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,800;1,900&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/contactStyle.css">
	<title>Contact Info</title>
</head>

<body>
	<nav class="navBar">
		<div class="elements">
			<a class="SF" href="index.html"><span class="safa">S </span>F</a>
			<ul class="items">
				<li class="hideOnMobile"><a href="index.php">Home</a></li>
				<li class="hideOnMobile"><a href="skill.php">Skills</a></li>
				<li class="menu_hamburger" onclick=showHam()><a href="#"><i class="fa-solid fa-bars"></i></a>
				</li>
			</ul>
			<ul class="items side_bar">
				<li onclick=hideSidebar()><a href="#"><i class="fa-sharp fa-solid fa-xmark"></i></a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="skill.php">Skills</a></li>
			</ul>
		</div>
	</nav>
	<div class="container2">
		<main class="row">
			<section class="col left">
				<div class="contactTitle">
					<h2>Get In Touch</h2>
					<p>I'd Love To Hear From You.</p>
				</div>
				<div class="contactInfo">
					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-phone"></i>
						</div>
						<div class="details">
							<span>Phone</span>
							<span><?php echo $phone;?></span>
						</div>
					</div>
					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-envelope"></i>
						</div>
						<div class="details">
							<span>Email</span>
							<span><?php echo $email; ?></span>
						</div>
					</div>

					<div class="iconGroup">
						<div class="icon">
							<i class="fa-solid fa-location-dot"></i>
						</div>
						<div class="details">
							<span>Location</span>
							<span><?php echo $location; ?></span>
						</div>
					</div>

				</div>
				<div class="socialMedia">
					<a target="_blank" href="https://www.facebook.com/profile.php?id=100079941048298"><i class="fa-brands fa-facebook-f"></i></a>
					<a target="_blank" href="https://www.instagram.com/ahmed__s_f_?fbclid=IwAR3J1MsLpI5O9PcN08HweMeTNebKzjBm-GgNZbdPcYZg9C2tScny46bMEK8"><i class="fa-brands fa-instagram"></i></a>
					<a target="_blank" href="https://www.linkedin.com/in/ahmedsafa114/"><i class="fa-brands fa-linkedin-in"></i></a>
				</div>
			</section>

			<section class="col right">
				<form action="" method="POST" class="messageForm">
					<div class="inputGroup halfWidth">
						<input type="text" name="name" required="required">
						<label>Your Name</label>
					</div>

					<div class="inputGroup halfWidth">
						<input type="email" name="email" required="required">
						<label>Email</label>
					</div>

					<div class="inputGroup fullWidth">
						<input type="text" name="subject" required="required">
						<label>Subject</label>
					</div>

					<div class="inputGroup fullWidth">
						<textarea required="required" name="say"></textarea>
						<label>Say Something</label>
					</div>

					<div class="inputGroup fullWidth">
						<button>Send Message</button>
					</div>
				</form>
			</section>
		</main>
	</div>

	<script src="./JS/hamburger.js"></script>
</body>

</html>