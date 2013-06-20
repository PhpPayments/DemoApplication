<!DOCTYPE html>
<html>
	<head>
		<title>PhpPayments Lib Demo</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
	</head>
	<body style="padding-top: 60px;">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar"
					        data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="/">PhpPayments Lib Demo</a>
					<!--
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="active"><a href="#">Home</a></li>
							<li><a href="#about">About</a></li>
							<li><a href="#contact">Contact</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle"
								   data-toggle="dropdown">Dropdown <b
										class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li class="nav-header">Nav header</li>
									<li><a href="#">Separated link</a></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li>
						</ul>
					</div>
					-->
				</div>
			</div>
		</div>

		<?php if (isset($_SESSION['flash'])) : ?>
			<div class="container">
				<div class="alert <?php echo !empty($_SESSION['flash']['message']) ? $_SESSION['flash']['class'] : ''; ?>">
					<?php echo !empty($_SESSION['flash']['message']) ? $_SESSION['flash']['message'] : ''; ?>
					<?php echo !empty($_SESSION['flash']['body']) ? $_SESSION['flash']['body'] : ''; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="container">
			<?php echo $contentForLayout; ?>
		</div>

		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
	</body>
</html>