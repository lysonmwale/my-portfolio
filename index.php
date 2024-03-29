<!DOCTYPE html>

<html lang="eng">

	<head>
		<meta charset="UTF-8"/>
		<title> my portfolio homepage</title>
		<link rel="stylesheet" type="text/css" href="style/test.css"/>

		<style>

			html{
				scroll-behavior: smooth;
			}
			
			* {box-sizing: border-box;}
			body {font-family: Verdana, sans-serif;}
			.mySlides {display: none;}
			img {vertical-align: middle;}
			
			/* Slideshow container */
			.slideshow-container {
			  max-width: 1000px;
			  position: relative;
			  margin: auto;
			}
			
			/* Caption text */
			.text {
			  color: #f2f2f2;
			  font-size: 15px;
			  padding: 8px 12px;
			  position: absolute;
			  bottom: 8px;
			  width: 100%;
			  text-align: center;
			}
			
			/* Number text (1/3 etc) */
			.numbertext {
			  color: #f2f2f2;
			  font-size: 12px;
			  padding: 8px 12px;
			  position: absolute;
			  top: 0;
			}
			
			/* The dots/bullets/indicators */
			.dot {
			  height: 15px;
			  width: 15px;
			  margin: 0 2px;
			  background-color: #bbb;
			  border-radius: 50%;
			  display: inline-block;
			  transition: background-color 0.6s ease;
			}
			
			.active {
			  background-color: #717171;
			}
			
			/* Fading animation */
			.fade {
			  animation-name: fade;
			  animation-duration: 1.5s;
			}
			
			@keyframes fade {
			  from {opacity: .4} 
			  to {opacity: 1}
			}
			
			/* On smaller screens, decrease text size */
			@media only screen and (max-width: 300px) {
			  .text {font-size: 11px}
			}

			#profile{
				border-radius: 120px;
			}
			</style>
	</head>

	<body>
		<header>

			<!--code for dynamic greeting depending on the day time -->
		
			<img id="profile" src="images/profile.png" alt="Profile picture" width="20%" height="20%"/>

			<h3 id="hello"></h3>

			<script>
				const time = new Date().getHours();
				let greeting;
				if (time < 12) {
				greeting = "Good morning";
				} else {
				greeting = "Good evening";
				}
				document.getElementById("hello").innerHTML = greeting;
			</script>
			<script src="javascript/portfolioJavascript.js"></script>
			<h1>Welcome to My Portfolio</h1>
		</header>
		

		<nav id="nav_menu">
			<ul>

				<li><a href="skills.html">Skills</a></li>

				<li><a href="Contact.html" class="current">Contact</a></li>

					<!-- smooth scrolling-->
				<li><a href="#contact_article">Write Us</a></li>
				
			</ul>
		</nav>
		
		<main>
			<div id="slideshow">
				<h3>Featured Projects</h3>
				
				<div class="slideshow-container">

					<div class="mySlides fade">
					  <div class="numbertext">1 / 3</div>
					  <img src="images/project1.jpg" style="width:100%;">
					  <div class="text">Caption Text</div>
					</div>
					
					<div class="mySlides fade">
					  <div class="numbertext">2 / 3</div>
					  <img src="images/project2.jpg" style="width:100%">
					  <div class="text">Caption Two</div>
					</div>
					
					<div class="mySlides fade">
					  <div class="numbertext">3 / 3</div>
					  <img src="images/project3.jpg" style="width:100%">
					  <div class="text">Caption Three</div>
					</div>
					
					</div>
					<br>
					
					<div style="text-align:center">
					  <span class="dot"></span> 
					  <span class="dot"></span> 
					  <span class="dot"></span> 
					</div>
					
					<script>
					let slideIndex = 0;
					showSlides();
					
					function showSlides() {
					  let i;
					  let slides = document.getElementsByClassName("mySlides");
					  let dots = document.getElementsByClassName("dot");
					  for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";  
					  }
					  slideIndex++;
					  if (slideIndex > slides.length) {slideIndex = 1}    
					  for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					  }
					  slides[slideIndex-1].style.display = "block";  
					  dots[slideIndex-1].className += " active";
					  setTimeout(showSlides, 2000); // Change image every 2 seconds
					}
					</script>
				
			</div>


			<article id="contact_article">
					
				<h3> Fill in the form to Contact Us</h3>
				
					<form>
							<label>Name:</label><br>
							<input type="text" id="name"  name="name "placeholder="Enter your Name" required="required" /><br />

							<label>Email Address:</label><br>
							<input type="text" id="email" name="email" placeholder="Enter your Email" required="required"/><br />
							
                            <label>Phone:</label><br>
							<input type="text" id="phone" name="phone" placeholder="Enter your Phone Number" required="required"/><br />
							
							<label> Message:</label><br>
							<textarea name="message" id="message" cols="50" rows="10"  required="required"></textarea><br />
							
							<label> &nbsp; </label>
							<button id="button" type="submit" name="submit">submit</button>
			
					</form>
					
			
				</article>
			
		</main>
		
	</body>

    <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contacts";
        
        $conn = mysqli_connect($server, $username,$password,$dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        include ('connect.php');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message =$_POST['message'];
        $phone = $_POST['phone'];
        
        $query = "INSERT INTO `users`(`name`, `email`, `message`, `phone`)
        VALUES ('$name','$email','$message','$phone')";
        
        if(mysqli_query($conn,$query)){
            echo "Data Inserted Succeafully!";
        }

    ?>



</html>