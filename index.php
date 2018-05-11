<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Complete Bootstrap 4 Website Layout</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapese navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link" href="#">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Connect</a>
                </li>          
                <li class="nav-item">
                    <a class="btn btn-primary" href="login.php">Login</a>
                    <a class="btn btn-danger" href="register.php">Register</a>
            </ul>    
           

</div>
</nav>
        <?php
        $con=mysqli_connect("localhost","root","","blog1");
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $result = mysqli_query($con,"SELECT * FROM images WHERE public=1");
        ?>
<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
<ul class="carousel-indicators">
                <?php
		        $i=0; 
		        while($row = $result->fetch_assoc() )
					{
				?>
				<li data-target="#slides" data-slide-to='<?php echo $i; ?>' class="active"></li>
				
				<?php $i++; } ?>

</ul>
<div class="carousel-inner">
                <?php 
				$result = mysqli_query($con,"SELECT * FROM images WHERE public=1");
				$j=0;
				while($row = $result->fetch_assoc() )
					{
						if($j==0){
				?>
    <div class="carousel-item active" >
                <?php } else { ?>
							<div class="carousel-item">
						<?php } ?>	
				<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="50" height="50"/>'; ?>
				</div>
				<?php $j++; } ?>
        
</div>
</div>
<!--- Jumbotron -->
<div class="container-fluid">
<div class="row jumbotron">
    <div class="col-xs-12 col-sm-12 cols-md-9 col-lg-9 col-xl-10">
        <p class="lead">A web hosting service allows individuals and organizations to make their website accsessible via the World Wide Web.</p>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
        <a href="#"><button type="button" class="btn btn-outline-secondary btn-lg">Web Hosting</button></a>
</div>
</div>
<!--- Welcome Section -->
<div class="container-fluid padding">
<div class="row welcome text-center">
    <div class="col-12">
        <h1 class="display-4">Built with ease.</h1>
    </div>
    <hr>
    <div class="col-12">
        <p class="lead">Welcome to my Bootstrap 4 website tutorial! Bootstrap is a free and open-source fron-end library with HTML and CSS based designs.</p>  
</div>
</div>
<!--- Three Column Section -->
<div class="container-fluid padding">
<div class="row text-center padding">
    <div class="col-xs-12 col-sm-6 col-md-4">
        <i class="fas fa-code"></i>
        <h3>HTML5</h3>
        <p>Built with the latest version of HTML, HTML5.</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <i class="fas fa-bold"></i>
        <h3>BOOTSTRAP</h3>
        <p>Built with the latest version of Bootstrap, Bootstrap 4.</p>
    </div>
    <div class="col-sm-12 col-sm-6 col-md-4">
        <i class="fab fa-css3"></i>
        <h3>CSS3</h3>
        <p>Built with the latest version of CSS, CSS3.</p>
    </div>    

</div>
<hr class="my-4">
</div>

<?php
    $con=mysqli_connect("localhost","root","","blog1");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($con,"SELECT * FROM blog_posts WHERE public=1");
?>

<!--- Two Column Section -->
<div class="container-fluid padding">
<div class="row padding">
    <div class="col-lg-6">
            <?php
				while($row = $result->fetch_assoc() )
				{
				?>
				<h2><?php echo $row['title']?></h2>
				<p><?php echo $row['post']?></p>
			<?php } ?>
				
        <a href="#" class="btn btn-primary">Learn more</a>
    </div>
    <div class="col-lg-6">
        <img src="img/desk.png" class="img-fluid">
</div>
</div>

<hr class="my-4">
<!--- Fixed background -->
<figure>
    <div class="fixed-wrap">
        <div id="fixed">
        </div>
    </div>
</figure>
<!--- Emoji Section -->
<button class="fun" data-toggle="collapse" data-target="#emoji">click for fun
</button>
<div id="emoji" class="collapse">
<div class="container-fluid padding">
<div class="row text-center">
    <div class="col-sm-6 col-md-3">
        <img class="gif" src="img/gif/panda.gif">
    </div>
    <div class="col-sm-6 col-md-3">
        <img class="gif" src="img/gif/poo.gif">
    </div>
    <div class="col-sm-6 col-md-3">
        <img class="gif" src="img/gif/unicorn.gif">
    </div>
    <div class="col-sm-6 col-md-3">
        <img class="gif" src="img/gif/chicken.gif">
    </div>
</div>
</div>
</div>


  
<!--- Meet the team -->
<div class="container-fluid padding">
<div class="row welcome text-center">
    <div class="col-12">
        <h1 class="display-4">Meet the Team</h1>
    </div>
    <hr>
</div>
</div>    

<!--- Cards -->
<div class="container-fluid padding">
<div class="row padding">
    <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="img/team1.png">
            <div class="card-body">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">John is an Internet entrepreneur with almost 20 years of experience.</p>
                <a href="#" class="btn btn-outline-secondary">See Profile</a>
            </div>
        </div>
    </div>   

      <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="img/team2.png">
            <div class="card-body">
                <h4 class="card-title">Marry Jo</h4>
                <p class="card-text">Mary is a designer with almost 10 years of digital design experience.</p>
                <a href="#" class="btn btn-outline-secondary">See Profile</a>
            </div>
        </div>
    </div>

      <div class="col-md-4">
        <div class="card">
            <img class="card-img-top" src="img/team3.png">
            <div class="card-body">
                <h4 class="card-title">Phil Ho</h4>
                <p class="card-text">Phil is a developer with over 5 years od web development experience.</p>
                <a href="#" class="btn btn-outline-secondary">See Profile</a>
            </div>
        </div>
    </div>     
</div>
</div>

<!--- Two Column Section -->
<div class="container-fluid padding">
<div class="row padding">
    <div class="col-lg-6">
    <h2>Our Philosophy</h2>
        <p>We know that greatness in a disruptive era requires bold ambition, curious talent and a culture that belives we're smarter together</p>
        <p>We approach every challenge holistically, with best-in-class expertise in data, creativity, media, technology, search, social and more. We call this Alchemy. It has the power to build our clients' brands and transform their business. And while it may seem like magic, we've got it down to a science.</p>
        <br>

    </div>
    <div class="col-lg-6">
        <img src="img/bootstrap2.png" class="img-fluid">
</div>
<hr class="my-4">
</div>


<!--- Connect -->
<div class="container-fluid padding">
<div class="row text-center padding">
    <div class='col-12'>
        <h2>Connect</h2>
    </div>
    <div class="col-12 social padding">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-google-plus-g"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
</div>
</div>
<!--- Footer -->
<footer>
    <div class="container-fluid padding">
    <div class="row text-center">
    <div class="col-md-4">
        <img src="img/w3newbie.png">
        <hr class="light">
        <p>555-555-555</p>
        <p>email@myemail.com</p>
        <p>100 Street Name</p>
        <p>City, State, 00000</p>
    </div>    
    <div class="col-md-4">
        <hr class="light">
        <h5>Our Hours</h5>
        <hr class="light">
        <p>Monday: 9am - 5pm</p>
        <p>Saturday: 10am - 4pm</p>
        <p>Sunday: closed</p>
    </div>    
    <div class="col-md-4">
        <hr class="light">
        <h5>Service Area</h5>
        <hr class="light">
        <p>City, State, 00000</p>
        <p>City, State, 00000</p>
        <p>City, State, 00000</p>
        <p>City, State, 00000</p>
    </div>
    <div class="col-12">
        <hr class="light">
        <h5>&copy; w3newbie.com</h5>
</div>
</div>
</footer>


</body>
</html>













