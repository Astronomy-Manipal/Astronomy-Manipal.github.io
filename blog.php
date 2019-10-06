<?php
	session_start();
	$article_id = "";
	$_SESSION['article_id'] = $article_id;

	require_once('includes/function/autoload.php');
	$mSqlObj = new MySqlDriver;
	$articles=$mSqlObj->selectOrderQry(ARTICLE,'','','id','','');
	
	$id_array = Array();
	$title_array = Array();
	$img_array = Array();
	$about_array = Array();
	
	while ($row = $articles->fetch_assoc())
	{
		$id_array[] = $row['id'];
		$title_array[] = $row['title'];
		$img_array[] = $row['image_links'];
		$about_array[] = $row['description'];
	}
	
    // convert the PHP array into JSON format, so it works with javascript
    $id_json = json_encode($id_array);
	// print_r($id_array);
	$title_json = json_encode($title_array);
	// print_r($title_array);
	$img_json = json_encode($img_array);
	// print_r($img_array);
	$about_json = json_encode($about_array);
	// print_r($about_array);
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
		
		<script src="js/handlebars.js"></script>
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


		<!-- Blogs Grid -->
		<section class="bg-light page-section" id="projects">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2 class="section-heading text-uppercase">Horologium.Space</h2>
						<h3 class="section-subheading text-muted">Some articles by the club members</h3>
					</div>
				</div>
				
			
				<div id="articles" style="width: 100%;">
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
	
	<script id="article-grid-template" type="text/x-handlebars-template">	
		<div class="row">	
		{{#each article}}
			<div class="col-md-4 col-sm-6 portfolio-item">
				<a href="blogpage.php?article={{id}}" class="portfolio-link" onclick="assign2php({{title}});">
					<div class="portfolio-hover">
						<div class="portfolio-hover-content">
							<i class="fas fa-plus fa-2x"></i>
						</div>
					</div>
							
					<img class="img-fluid" src="img/articles/{{imgsrc}}" alt="{{title}}" style="width: 400px; height: 250px;">
				</a>
				<div class="portfolio-caption">
					<h4>{{title}}</h4>
					<p class="text-muted">
						{{about}}
					</p>
				</div>
			</div>
			
		{{/each}}
		</div>
	</script>
	
	<script type="text/javascript">
		
		var i=0;
		var id_array = <?php echo $id_json; ?>;
		var title_array = <?php echo $title_json; ?>;
		var img_array = <?php echo $img_json; ?>;
		var about_array = <?php echo $about_json; ?>;
		
		var imgsrc_array = [];
		
		for(i=0; i<img_array.length; i++)
		{
			var imagesrcs = img_array[i].split(";");
			imgsrc_array[i] = imagesrcs[0];
		}
		
		var data={};
		
		function toJSONObject()
		{
			i=0;
			var article =[];
			id_array.forEach(function(entry)
			{
				var article_obj={}
				article_obj['id'] = entry;
				article_obj['title'] = title_array[i];
				article_obj['imgsrc'] = imgsrc_array[i];
				article_obj['about'] = about_array[i];
				i = i+1;
				// alert("id: " + article_obj['id']);
				// alert("title: " + article_obj['title']);
				// alert("image: " + article_obj['imgsrc']);
				article.push(article_obj);
			});
			data={article};
		}
		
		toJSONObject();
		
		var source = $("#article-grid-template").html();
		var detail_template = Handlebars.compile(source);
		var html = detail_template(data);
		$('#articles').html(html);
		
		</script>
		
		<!--
		<script type="text/javascript">
		
			function assign2php(title)
			{
				alert("a");
				
				//document.cookie = 'title =' + title;	
				//?php $title = $_COOKIE['title']; ?>
			}
			
		</script>
		-->
</body>

</html>
