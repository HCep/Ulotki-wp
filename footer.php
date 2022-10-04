<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
		<?php get_sidebar('footer'); ?> 
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
  <?php if(is_front_page()): ?>
<script type="text/javascript">
  new Splide( '.splide',{
	perPage: 2,
	arrowPath:'M24 12.001H2.914l5.294-5.295-.707-.707L1 12.501l6.5 6.5.707-.707-5.293-5.293H24v-1z',
  } ).mount();
</script>
<?php endif; ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
    jQuery('.form-radio .wpcf7-list-item').on('click', (e)=>{
		if(jQuery(e).hasClass('current-radio')){
		jQuery(e).removeClass('current-radio');
        }
        else {
            jQuery(e).addClass('current-radio');
		}
	})


});
	</script>
	<script src="<?php echo get_template_directory_uri(); ?>/node_modules/lightbox2/dist/js/lightbox.js">

</script>

<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
	  'albumLabel':"%1 z %2"
    })
</script>
</body>
</html>
