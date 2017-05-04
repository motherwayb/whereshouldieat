<?php 

	$this->load->view('header', ['map' => true]); 
	$this->load->view('thumbnails');   
	$this->load->view('about');
	$this->load->view('contact');
	$this->load->view('search');

?>


<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
	<a class="btn btn-primary" href="#page-top">
		<i class="fa fa-chevron-up"></i>
	</a>
</div>

<?php $this->load->view('footer')?>

