<?php $enableLightbox = true; ?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link
		rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
		crossorigin="anonymous">

	<title>My Shop!</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<?php
	if (isset($loadVueJs) && $loadVueJs == true) {
		?>
		<!-- development version, includes helpful console warnings -->
		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

		<!-- production version, optimized for size and speed -->
		<!--		<script src="https://cdn.jsdelivr.net/npm/vue"></script>	-->
		<?php
	}
	?>
	<style type="text/css">
		.navbar-side {
			height: 100%;
			position: fixed;
			top: 0;
			right: 0;
			padding: 0;
			border-left: 4px solid #DDDDDD;
			overflow-y: scroll;
			z-index: 1000;

			-webkit-transform: translateX(100%);
			-ms-transform: translateX(100%);
			transform: translateX(100%);
			-webkit-transition: 300ms ease;
			transition: 300ms ease;
		}

		.navbar-side-border-bottom {
			border-bottom: 2px solid #ccc;
		}

		.navbar-side-border-top {
			border-top: 2px solid #ccc;
		}

		.side-link {
			padding-left: 2rem;
		}

		.reveal {
			-webkit-transform: translateX(0%);
			-ms-transform: translateX(0%);
			transform: translateX(0%);
			-webkit-transition: 300ms ease;
			transition: 300ms ease;
		}

		.overlay {
			position: fixed;
			display: none;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			cursor: pointer;
			background-color: #000000;
			opacity: 0.6;
			z-index: 990;
		}
		.x-small {
			font-size: 0.75rem;
		}

	</style>
	<script src="https://kit.fontawesome.com/231b614f56.js" crossorigin="anonymous" async></script>
</head>

<body>

<nav class="navbar navbar-dark bg-primary active bg-gradient">
	<div class="container">
		<a class="navbar-brand text-truncate" href="#"><?= $this->Session->read('Site.title') ?></a>
	</div>
</nav>

<nav class="navbar p-0" role="navigation">
	<!-- navbar-side will go here -->
	<ul class="navbar-side navbar-nav bg-white text-dark px-2 text-left list-group" id="navbarSide">
		<?php echo $this->element('categories_menu'); ?>
	</ul>
	<div class="overlay"></div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark navbar-static bg-dark ">
	<div class="container">
		<div class="navbar-toggler border-0 p-1 py-0 text-white" type="button" data-toggle="collapse" data-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span> Menu
		</div>
		<a class="navbar-brand" href="/">
			Home
		</a>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<?php
				if ($this->App->isSeller()) {
					?>
					<li class="nav-item">
						<a class="nav-link" href="/users/setView/seller">Manage
							Store</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/users/myaccount">My Account</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/users/logout">Logout</a>
					</li>
					<?php
				} else { ?>
					<li class="nav-item">
						<a class="nav-link" href="/users/login">Login</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

<ul class="nav justify-content-center bg-light border-bottom">
	<li class="nav-item productSideBar">
		<a class="nav-link" href="#">Products</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="#">Orders</a>
	</li>
</ul>

<!-- Navigation -->
<?php
//debug($this->Session->read());
?>
<div class="container">
	<?php echo $this->Session->flash(); ?>
</div>

<div class="container mt-3">
	<?php echo $this->element('myshoppinglist_topnav'); ?>
	<?php echo $this->fetch('content'); ?>
</div>

<div class="container">
	<style type="text/css">
		.cake-sql-log td {
			color: #666;
			font-size: 80%;
			padding: 5px;
			border-top: 1px solid dodgerblue;
		}
	</style>
	<?php echo $this->element('sql_dump'); ?>
	<!-- footer -->
</div>

<!-- Optional JavaScript -->
<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>

<script>
	// lazy load images
	if ($("img.lazy").length) {
		$("img.lazy").lazyload({
			effect: "fadeIn"
		});
	}

	// bootstrap tooltip
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	})

	// custom js
	$(document).ready(function () {

		// Open navbarSide when button is clicked
		$('.productSideBar').on('click', function () {
			$('#navbarSide').addClass('reveal');
			$('.overlay').show();
		});

		// Close navbarSide when the outside of menu is clicked
		$('.overlay').on('click', function () {
			$('#navbarSide').removeClass('reveal');
			$('.overlay').hide();
		});

	});

	// POST method implementation:
	async function postData(url = '', data = {}) {
		// Default options are marked with *
		const response = await fetch(url, {
			method: 'POST', // *GET, POST, PUT, DELETE, etc.
			mode: 'cors', // no-cors, *cors, same-origin
			cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
			credentials: 'same-origin', // include, *same-origin, omit
			headers: {
				'Content-Type': 'application/json'
				// 'Content-Type': 'application/x-www-form-urlencoded',
			},
			redirect: 'follow', // manual, *follow, error
			referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
			body: JSON.stringify(data) // body data type must match "Content-Type" header
		});
		return response.json(); // parses JSON response into native JavaScript objects
	}

	// GET page implementation:
	async function getPage(url = '', data = {}) {
		const response = await fetch(url + '?isAjax=1');

		return response.text(); // parses into html
	}

	// GET data implementation:
	async function getData(url = '', data = {}) {
		const response = await fetch('http://example.com/movies.json');

		return response.json(); // parses JSON response into native JavaScript objects
	}
</script>

<!-- images zoom in - lightbox -->
<?php
if (isset($enableLightbox) && $enableLightbox) {
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css"
		  integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
		  crossorigin="anonymous"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
			integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
			crossorigin="anonymous" async></script>
	<?php
}
?>
<?php
if (isset($enableLightbox) && $enableLightbox) {
	?>
	<script>
		$(document).ready(function () {
			if ($('#productImages a').length) {
				//$('#productImages a').lightBox();
			}
			if ($('#photogallery').length) {
				$('#photogallery').attr('class', 'active');
			}
			if ($('#contentImages a').length) {
				//$('#contentImages a').lightBox();
			}
		});
	</script>
	<?php
}
?>

</body>
</html>