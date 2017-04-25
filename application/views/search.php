<div class="portfolio-modal modal fade" id="portfolioModalSearch" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-content">
		<div class="close-modal" data-dismiss="modal">
			<div class="lr">
				<div class="rl"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="search-modal-body">
						<h2 id="search-business-name"></h2>
						<hr class="star-primary">
						<p>
							<b>Food Type: <span id="search-food-type"></span></b>
						</p>
						<ul class="list-inline item-details">
							<li>
								Address:
								<strong id="search-address"><?php print $businesses[$food_type][$random_business_id]['address'] ?></strong>
							</li>
							<li>
								Rating:
								<div id="search-rating"class="rating" stye="display:inline-block"></div>
							</li>
							<li>
								Phone:
								<strong id="search-phone"><?php print $businesses[$food_type][$random_business_id]['phone'] ?></strong>
							</li>
						</ul>
						<p>
							<iframe id="search-map" width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="#"></iframe>
							<br />
						</p>
						<p>
							<b>Website:</b>
							<a id="search-website" href="#" target="_blank"></a>
						</p>
					</div>
					<p>
						<b>Opening Hours:</b>
						</br>
						<p id="search-opening-hours"></p>
					</p>
					<div id="google-map-results"></div>
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>