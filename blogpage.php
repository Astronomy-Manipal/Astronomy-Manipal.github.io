<?php
	$article_id = $_GET['article'];
	
	require_once('includes/function/autoload.php');
	$mSqlObj = new MySqlDriver;
	$article_data=$mSqlObj->selectOrderQry(ARTICLE,"id=?",array($article_id),'id','','');
	
	while ($row = $article_data->fetch_assoc())
	{
		$title[] = $row['title'];
		$img[] = $row['image_links'];
		$data[] = $row['data'];
	}
	$title = $title[0];
	$img = $img[0];
	$data = $data[0];
	// echo $title;
	// echo $img;
	// echo $data;
	// die();
?>
	

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Horologium.Space</title>

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template -->
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

		<link href="css/agency.css" rel="stylesheet">
	</head>


	<body id="page-top">

		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="mainNav" style="background: black">
			<div class="container">
				<a class="navbar-brand js-scroll-trigger" href="#page-top">The Astronomy Club</a>
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					Menu <i class="fas fa-bars"></i>
				</button>

				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav text-uppercase ml-auto">
						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="index.php#events">Events</a>
						</li>

						<li class="nav-item">
							<a class="nav-link active js-scroll-trigger" href="blog.php">Blog</a>
						</li>

						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="index.php#projects">Projects</a>
						</li>

						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="index.php#about">About</a>
						</li>

						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="index.php#team">Team</a>
						</li>

						<li class="nav-item">
							<a class="nav-link js-scroll-trigger" href="index.php#contact">Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>


		<!-- Article -->
		<section class="bg-light page-section" id="projects">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2 id="title" class="section-heading text-uppercase">Dark Matter</h2>
						<img id="image" class="img-fluid" src="img/map-image.png" width="500px"/>

						<p id="data">
							When we think about gravity, we think about how we are perpetually pulled towards the ground. How objects thrown upward are bound to fall back down. Our use of the term ‘Gravity’ is aimed more at phenomena localized around Earth. But gravity isn’t just restricted to the Earth. What about the moon revolving around the earth? Or planets revolving around the sun? Even our solar system is constantly in motion around the center of our galaxy.
							All these are due to a unique phenomenon we call Gravitation.
							<br />
							The force of Gravity is a result of this phenomenon and is one of the fundamental forces of nature. This force is the real deal. It’s the reason behind why a lot of things in the universe behave the way they do. It constitutes the basis of star formation and is why we even have an atmosphere that supports life.
							In this article, we’ll be taking a closer look at this amazing, yet not fully understood phenomenon, how it came to be known as gravitation, the way it affects our universe and of course, its ultimate child of doom – Black Holes.
							<br />
							So, I’ve made clear what gravity does and how it is important. But what is gravitation exactly?
							Quite simply, it’s the phenomenon of attraction between various objects. The force of gravity is the weakest fundamental force, but it has a massive range, theoretically infinite.
							<br />
							Another theory of what could lie inside a black hole is that once you cross the event horizon, from seeing all black, you would see all white! The light that gets trapped in the black hole orbits around the central singularity. This light could’ve been from any point in time. When you cross the event horizon, you would finally be able to detect all this light. This means that you would be able to take a look at the past, because the light could be from any era! But because there’s just so much light trapped in the black hole, your eyes wouldn’t be able to handle the brightness and all you’d be seeing is white!
							Remember when I said gravity affects time too? Well, black holes have an intense gravitational pull, so time is seriously dilated. A friend watching you get closer to the event horizon would never actually see you cross it. Instead, they would see you slow down and freeze in time completely before you cross it. But, you wouldn’t notice a thing!
						</p>
					</div>
				</div>
			</div>
		</section>

  <!-- Contact -->
  <section class="page-section" id="contact">
	<div class="container">
	  <div class="row">
		<div class="col-lg-12 text-center">
		  <h2 class="section-heading text-uppercase">Contact Us</h2>
		  <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
		</div>
	  </div>
	  <div class="row">
		<div class="col-lg-12">
		  <form id="contactForm" name="sentMessage" novalidate="novalidate">
			<div class="row">
			  <div class="col-md-6">
				<div class="form-group">
				  <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
				  <p class="help-block text-danger"></p>
				</div>
				<div class="form-group">
				  <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
				  <p class="help-block text-danger"></p>
				</div>
				<div class="form-group">
				  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
				  <p class="help-block text-danger"></p>
				</div>
			  </div>
			  <div class="col-md-6">
				<div class="form-group">
				  <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
				  <p class="help-block text-danger"></p>
				</div>
			  </div>
			  <div class="clearfix"></div>
			  <div class="col-lg-12 text-center">
				<div id="success"></div>
				<button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
			  </div>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </section>

  <!-- Footer -->
  <footer class="footer">
	<div class="container">
	  <div class="row align-items-center">
		<div class="col-md-4">
		  <span class="copyright">Copyright &copy; The Astronomy Club 2019</span>
		</div>
		<div class="col-md-4">
		  <ul class="list-inline social-buttons">
			<li class="list-inline-item">
			  <a href="#">
				<i class="fab fa-facebook-f"></i>
			  </a>
			</li>
			<li class="list-inline-item">
			  <a href="#">
				<i class="fab fa-instagram"></i>
			  </a>
			</li>
		  </ul>
		</div>
		<div class="col-md-4">
		  <ul class="list-inline quicklinks">
			<li class="list-inline-item">
			  <a href="#">Privacy Policy</a>
			</li>
			<li class="list-inline-item">
			  <a href="#">Terms of Use</a>
			</li>
		  </ul>
		</div>
	  </div>
	</div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

	<script type="text/javascript">
		images = "<?php echo $img; ?>";
		var imagesrc_array = images.split(";");
		var imagesrc = imagesrc_array[0];
		document.getElementById("title").innerText = "<?php echo $title; ?>";
		document.getElementById("image").src = "img/articles/" + imagesrc;
		document.getElementById("data").innerHTML = `<?php echo $data; ?>`;
	</script>
	
</body>

</html>
