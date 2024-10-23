<?php
 $path = 'datafile.txt';
 if (isset($_POST['lat']) && isset($_POST['long']) && isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['height']) && isset($_POST['contrib']) && isset($_POST['date'])) {
    $fh = fopen($path,"a+");
    $string = $_POST['lat'].' - '.$_POST['long'].' - '.$_POST['name'].' - '.$_POST['desc'].' - '.$_POST['height'].' - '.$_POST['contrib'].' - '.$_POST['date']."\n";
    fwrite($fh,$string); 
    fclose($fh); 
 }
?>


<html>
<head>
	<meta charset="UTF-8">
	<title>Thank you!</title>
	<link rel="stylesheet" href="stylesheet.css">

</head>
<body>
	<header>
		<h1 class="animated-title">Bridge Clearance</h1>
		<nav>
			<ul>
			<li><a href="/project.html">Home</a></li>
				<li><a href="/index.html">About</a></li>
				<li><a href="/maps.php">Maps</a></li>
			</ul>
		</nav>
		<form action="#" method="get">
			<label for="search">Search:</label>
			<input type="text" id="search" name="search">
			<button type="submit">Go</button>
		</form>
	</header>

	<main>
		<section>
			<h2>Thank you for submitting your data!</h2>
			<p>Click the button below to return to the about page.</p>
			<div>
                <button onclick="window.location.href = 'about.html';">Return</button>
              </div>
		</section>
	</main>

</body>
</html>
