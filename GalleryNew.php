<?php add_shortcode( 'outdoorgallery', 'outdoorgallery'); 

?>


<?php function outdoorgallery(){ ob_start(); ?>

<style>
	
.modal-target {
 
  cursor: pointer;
  transition: 0.3s;
}

.modal-target:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 900; /* Sit on top */
  padding-top: 10px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  z-index: 1910;
  display: block;
  width: 80%;
  opacity: 1 !important;
  max-width: 1200px;
}
#modal-content {
    height: 80vh;
    width: auto;
}

/* Caption of Modal Image */
.modal-caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 1200px;
  text-align: center;
  color: white;
  font-weight: 700;
  font-size: 1em;
  margin-top: 32px;
}

/* Add Animation */
.modal-content, .modal-caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-atransform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.modal-close {
  
  position: relative;
  left: 75%;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.modal-close:hover,
.modal-close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
	
.masonry img {
  width: 100%;
}

.masonry {
	column-count: 2;
	column-gap: 16px;
}

.masonry .mItem {
  
  margin-bottom: 16px;
  width: 100%;
}

@media (max-width: 1199px) {
  .masonry {
    column-count: 2;
  }
}

@media (max-width: 991px) {
  .masonry {
    column-count: 2;
  }
}

@media (max-width: 767px) {
  .masonry {
    column-count: 1;
  }
}

</style>
<div id="masoncont">
	
<?php $outdoor_gallery = get_field( 'outdoor_gallery' );
if ( $outdoor_gallery ) : ?>
<div class="masonry">
	<?php foreach( $outdoor_gallery as $image ) : ?>
	<div class="mItem">
		<img class="modal-target imgbtn" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
	</div>
		<?php endforeach; ?>
</div>		
<?php endif; ?>
<!-- The Modal -->
<div id="modal" class="modal">
  <span id="modal-close" class="modal-close">&times;</span>
  <img id="modal-content" class="modal-content">
  <div id="modal-caption" class="modal-caption"></div>
</div>
</div>

<script>
// Modal Setup
var modal = document.getElementById('modal');

var modalMenuEffect = document.querySelector('.mainhead');
	
var modalClose = document.getElementById('modal-close');
modalClose.addEventListener('click', function() { 
  modal.style.display = "none";
	document.querySelector('.mainhead').style.display = "block";
});
	
var modalCloseY = document.getElementById('modal-content');
modalCloseY.addEventListener('click', function() { 
  modal.style.display = "none";
	document.querySelector('.mainhead').style.display = "block";
});
	
var modalCloseR = document.querySelector('.modal');
modalCloseR.addEventListener('click', function() { 
  modal.style.display = "none";
	document.querySelector('.mainhead').style.display = "block";
});
	
var modalCloseX = document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
        modal.style.display = "none";
		document.querySelector('.mainhead').style.display = "block";
    }
};	

// global handler
document.addEventListener('click', function (e) { 
  if (e.target.className.indexOf('modal-target') !== -1) {
      var img = e.target;
      var modalImg = document.getElementById("modal-content");
      var captionText = document.getElementById("modal-caption");
      modal.style.display = "block";
      modalImg.src = img.src;
      captionText.innerHTML = img.alt;
   }
});
	
$('.imgbtn').click(function(){
document.querySelector('.mainhead').style.display = "none";
});	
</script>


<?php return ob_get_clean();
    wp_reset_postdata(); 
};
