<html>
    <head>
        <title>CodeIgniter Tutorial</title>
    </head>
    <body>

        <h1>CodeIgniter Tutorial</h1>
		
		<h2>Welcome <?php echo $_SESSION['logged_in']['username']; ?>!</h2>
		<a href="login/logout">Logout</a>
		
		<?php echo var_dump($_SESSION); ?>
		
			<p>
				<a href="/index.php/news">News</a>
				<a href="/index.php/news/create">Create News</a>
				<a href="/index.php/about">About</a>
			</p>
			
		<h2><?php echo $title ?></h2>