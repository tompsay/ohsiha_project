<html>
    <head>
        <title>News Service</title>
    </head>
    <body>

        <h1>New Service</h1>
		
		<h2>Welcome <?php echo $_SESSION['logged_in']['username']; ?>!</h2>
		<a href="login/logout">Logout</a>
		
			<p>
				<a href="/index.php/news">News</a>
				<a href="/index.php/news/create">Create News</a>
				<a href="/index.php/news/get_times_news">Get Some REAL News!</a>
				<a href="/index.php/news/delete_all">Delete all News</a>
				<a href="/index.php/about">About</a>
			</p>
			
		<h2><?php echo $title ?></h2>