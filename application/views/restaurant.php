<?php $this->load->view('header', [
	'map' => true
]); 
?>
<div class="modal-content">
	<div class="close-modal" data-dismiss="modal">
		<div class="lr">
			<div class="rl"></div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="modal-body">
					<h2><?php print $restaurant->name ?></h2>
					<?php if (base_url() . '../assets/img/restaurants/' . $restaurant->slug . '.jpg'): ?>
						<img width="100%" src="<?php print base_url() . 'assets/img/restaurants/' . $restaurant->slug . '.jpg' ?>"></img>
					<?php endif; ?>
					<hr class="star-primary">
					<p>
						<b>Food Type: <?php print $restaurant->food_type ?></b>
					</p>
					<ul class="list-inline item-details">
						<li>
							Address:
							<strong><?php print $restaurant->address ?></strong>
						</li>
						<li>
							Rating:
							<div class="rating" stye="display:inline-block">
								<?php for ($i=0;$i<round($restaurant->rating);$i++): ?>
									<span>☆</span>
								<?php endfor; ?>
							</div>
						</li>
						<li>
							Phone:
							<strong><?php print $restaurant->phone_number ?></strong>
						</li>
					</ul>
					<p>
						<iframe width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php print $restaurant->map_url ?>&amp;ie=UTF8&amp;output=embed"></iframe>
						<br />
					</p>
					<p>
						<b>Website:</b>
						<a href="<?php print $restaurant->website ?>" target="_blank">
							<?php print $restaurant->website ?>
						</a>
					</p>
					<p>
						<b>Opening Hours:</b> 
						</br>
						<?php if ($restaurant->opening_hours): ?>
							<?php foreach ($restaurant->opening_hours as $opening_time): ?>
								<?php print $opening_time; ?><br/>
							<?php endforeach; ?>
						<?php endif; ?>
					</p></br></div></div></div></div>
<section class="nosuccess" id="whatdowethink">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>What do we think?</h2><br>
				</div>
		</div></section>
		<section class="whatdowethinkrating" id="whatdowethink">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-0"> <h3>VIDEOS</h3>
			</div>
			
			<div class="col-lg-6 col-lg-offset-0"> <h3><b>BRIAN says:</b></br>
						<b>PADDY says:</b></br>
						<b>PK says:</b></br></h3> 	
			</div><br>			</div>
			
			
		</div>
</section>
				