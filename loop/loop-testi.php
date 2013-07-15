<?php /* Loop Name: Testi */ ?>
<?php if (have_posts()) : while (have_posts()) : the_post();
	$content = get_the_content();
	if (!empty($content)) { ?>
		<div id="page-content"><?php the_content(); ?></div>
	<?php }
endwhile; endif;

// WPML filter
$suppress_filters = get_option('suppress_filters');

$temp     = $wp_query;
$wp_query = null;
$args = array(
		'post_type'        => 'testi',
		'showposts'        => 4,
		'paged'            => $paged,
		'suppress_filters' => $suppress_filters
		);
$wp_query = new WP_Query($args);

if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();
	$testiname = get_post_meta($post->ID, 'my_testi_caption', true);
	$testiurl  = get_post_meta($post->ID, 'my_testi_url', true);
	$testiinfo = get_post_meta($post->ID, 'my_testi_info', true);
?>
<article id="post-<?php the_ID(); ?>" class="testimonial clearfix">
	<blockquote class="testimonial_bq">
		<?php if(has_post_thumbnail()) {
			$thumb   = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
			$image   = aq_resize( $img_url, 120, 120, true ); //resize & crop img
		?>
		<figure class="featured-thumbnail thumbnail hidden-phone">
			<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
		</figure>
		<?php } ?>
		<div class="testimonial_content">
			<?php the_content(); ?>
			<small>
				<?php if($testiname) { ?>
					<span class="user"><?php echo $testiname; ?></span><?php echo ', '; ?>
				<?php } ?>
				<?php if($testiinfo) { ?>
					<span class="info"><?php echo $testiinfo; ?></span><br />
				<?php } ?>
				<?php if($testiurl) { ?>
					<a href="<?php echo $testiurl; ?>"><?php echo $testiurl; ?></a>
				<?php } ?>
			</small>
		</div>
	</blockquote>
</article>
<?php endwhile; else: ?> 
<div class="no-results">
	<?php echo '<p><strong>' . theme_locals("there_has") . '</strong></p>'; ?>
	<p><?php echo theme_locals("we_apologize"); ?> <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>"><?php echo theme_locals("return_to"); ?></a> <?php echo theme_locals("search_form"); ?></p>
	<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
</div><!--no-results-->
<?php endif; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<ul class="pager">
		<li class="previous">
		  <?php previous_post_link('%link', theme_locals("prev_post")) ?>
		</li><!--.previous-->
		<li class="next">
		  <?php next_post_link('%link', theme_locals("next_post")) ?>
		</li><!--.next-->
	</ul><!--.pager-->
<?php endif; ?>

<?php 
	$wp_query = null; 
	$wp_query = $temp;
?>