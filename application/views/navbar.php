<nav class="navbar navbar-default navbar-fixed-top">
<!-- if the map is being displayed i.e. homepage -->
	<?php if ($map): ?>
		<div id="map-wrapper">
			<div id="map"></div>
			<div class="overlay">
				<div id="load" style="visibility:hidden;"></div>
				<span class="location">Location</span>
				<div class="location-choices">
					<span class="choice1"><a class="choice1">Near Me</a></span>
					<span class="choice2">Choose Location</span>
					<span class="choice3"><a class="choice3">Anywhere</a></span>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="container">
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>			
			<div class="collapse navbar-collapse navbar-fixed-top" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-center">
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					<li class="page-scroll">
						<a href="<?php print base_url() ?>" class="header-button <?php print $map ? 'map' : '' ?>">What to Eat</a>
					</li>
					<li class="page-scroll">
						<a href="<?php print base_url() ?>#about" class="header-button <?php print $map ? 'map' : '' ?>">About</a>
					</li>
					<!-- Logo -->
					<a class="navbar-brand" href="<?php print base_url() ?>" title="Where Should I Eat?">
						<img id="navbar-logo" 
							style="width:100%; max-width:300px; margin-top: -101px;"
							src="<?php echo base_url() ?>assets/img/logo/<?php print $map ? 'wsiewhite.png' : 'wsieblue.png' ?>">
						</img>
					</a>
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					<li class="page-scroll">
						<a href="<?php print base_url() ?>#contact" class="header-button <?php print $map ? 'map' : '' ?>">Contact</a>
					<li class="page-scroll" data-toggle="modal" data-target="#myModal">
						<a href="#login" class="header-button <?php print $map ? 'map' : '' ?>">Login</button></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>