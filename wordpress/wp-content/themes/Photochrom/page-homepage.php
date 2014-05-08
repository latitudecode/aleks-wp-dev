<?php
/*
 * Template Name: Homepage
 * Description: A Page Template with a darker design.
 */

//

?>

<?php get_header(); ?>

	<!-- end: head -->
	<body class="blog">

<?php query_posts('showposts=1'); if(have_posts()) : while(have_posts()) : the_post(); ?> <!-- starting the WordPress loop -->

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<!-- content -->
<div style="background-image: url('<?php echo $image[0]; ?>'); background-size: cover;" class="content"><?php endif; ?>
	<!-- picks -->
	<div class="fit">
		
				
		<div class="homepage-feature"> <!-- big project -->

			<h2><?php the_title(); ?></h2><!-- big project title -->

			<p class="project-blurb"><?php the_excerpt( 500); ?></p>

		</div> <!-- end big  project -->

		<?php endwhile; ?>

            <?php else : ?>
                <p>Whoops! We are working on it.</p>

            <?php endif; ?> <!-- end loop -->
		
	</div>
	<!-- end: picks -->
</div>
</div>

	<!-- body -->
	<body class="blog">
	


<!-- content -->
<div class="content">

 



		
		<?php query_posts('page_id=30'); if(have_posts()) : while(have_posts()) : the_post(); ?> <!-- starting the WordPress loop -->
			
		<div class="homepage-meta"> <!-- big project -->

			<h2><?php the_title(); ?></h2><!-- big project title -->

			<p class="project-blurb"><?php the_excerpt(); ?></p>

		</div> <!-- end big  project -->

				<?php endwhile; ?>

            <?php else : ?>
                <p>Whoops! We are working on it.</p>

            <?php endif; ?> <!-- end loop -->

	<!-- post list -->
	<ul id="post-list">
	

				
		<!-- article -->
<li id="article-119" class="post-119 post type-post status-publish format-standard hentry category-experiments category-uncategorized tag-envato tag-themeforest has-featured">
		
		
	<!-- figure -->
	<a href="../right-now-here/index.html" class="post-figure">
	

		<!-- image -->		
		<img width="480" height="318" src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>" class="attachment-post-thumbnail wp-post-image" />	
	</a>
	<!-- end: figure -->
	
		
	<!-- info -->
	<div class="post-info">
		
		<!-- title -->
		<h2 class="post-title"><a href="index.php?cat=3">Short Stories</a></h2>
		
				<!-- meta -->
		<ul class="meta">
			
			<!-- number of posts -->
			<li><?php
				$args=array(
				  'include' => 3,
				  'orderby' => 'name',
				  'order' => 'ASC'
				  );
				$categories=get_categories($args);
				  foreach($categories as $category) {
				    echo '<a href="' . get_category_link( $category->term_id ) . '' . sprintf( __( "View all posts in %s" )) . '" ' . '>' . ' '  . $category->count . ' project </a> </p> ';
				  }
				?>
			</li>
			
			
		</ul>
		<!-- end: meta -->
	
	</div>
	<!-- end: info -->

</li>
<!-- end: article -->	
							
				
		<!-- article -->
<li id="article-116" class="post-116 post type-post status-publish format-standard hentry category-experiments category-preview tag-themeforest tag-yolo has-featured">
		
		
	<!-- figure -->
	<a href="../lights-out/index.html" class="post-figure">
	
		<!-- image -->		
		<img width="480" height="318" src="../wp-content/uploads/2013/06/tumblr_mef3i4VxvO1qli3iko1_1280-480x318.jpg" class="attachment-post-thumbnail wp-post-image" alt="Another caption here." />	
	</a>
	<!-- end: figure -->
	
		
	<!-- info -->
	<div class="post-info">
		
		<!-- title -->
		<h2 class="post-title"><a href="index.php?cat=4">Books</a></h2>
					
		<!-- meta -->
		<ul class="meta">
			
			<!-- number of posts -->
			<li><?php
				$args=array(
				  'include' => 4,
				  'orderby' => 'name',
				  'order' => 'ASC'
				  );
				$categories=get_categories($args);
				  foreach($categories as $category) {
				    echo '<a href="' . get_category_link( $category->term_id ) . '' . sprintf( __( "View all posts in %s" )) . '" ' . '>' . ' '  . $category->count . ' project </a> </p> ';
				  }
				?>
			</li>
			
		</ul>
		<!-- end: meta -->
	
	</div>
	<!-- end: info -->

</li>
<!-- end: article -->	
							
				
		<!-- article -->
<li id="article-111" class="post-111 post type-post status-publish format-standard hentry category-preview category-tests tag-content tag-meaningless tag-yolo has-featured">
		
		
	<!-- figure -->
	<a href="../stacking-stuff/index.html" class="post-figure">
	
		<!-- image -->		
		<img width="480" height="318" src="../wp-content/uploads/2013/06/tumblr_m92hfqgAnq1qli3iko1_1280-480x318.jpg" class="attachment-post-thumbnail wp-post-image" alt="tumblr_m92hfqgAnq1qli3iko1_1280" />	
	</a>
	<!-- end: figure -->
	
		
	<!-- info -->
	<div class="post-info">
		
		<!-- title -->
		<h2 class="post-title"><a href="index.php?cat=5">Videos</a></h2>
			
		<!-- meta -->
		<ul class="meta">
			
			<!-- number of posts -->
			<li><?php
				$args=array(
				  'include' => 5,
				  'orderby' => 'name',
				  'order' => 'ASC'
				  );
				$categories=get_categories($args);
				  foreach($categories as $category) {
				    echo '<a href="' . get_category_link( $category->term_id ) . '' . sprintf( __( "View all posts in %s" )) . '" ' . '>' . ' '  . $category->count . ' project </a> </p> ';
				  }
				?>
			</li>
			
		</ul>
		<!-- end: meta -->
	
	</div>
	<!-- end: info -->

</li>
<!-- end: article -->	
							
				
		<!-- article -->
<li id="article-103" class="post-103 post type-post status-publish format-standard hentry category-preview tag-themeforest has-featured">
		
		
	<!-- figure -->
	<a href="../showing-off/index.html" class="post-figure">
	
		<!-- image -->		
		<img width="480" height="318" src="../wp-content/uploads/2013/06/tumblr_m9zdr7Fi5M1qli3iko1_1280-480x318.jpg" class="attachment-post-thumbnail wp-post-image" alt="tumblr_m9zdr7Fi5M1qli3iko1_1280" />	
	</a>
	<!-- end: figure -->
	
		
	<!-- info -->
	<div class="post-info">
		
		<!-- title -->
		<h2 class="post-title"><a href="index.php?cat=6">Skits</a></h2>
		
				
		<!-- meta -->
		<ul class="meta">
			
<!-- number of posts -->
			<li><?php
				$args=array(
				  'include' => 6,
				  'orderby' => 'name',
				  'order' => 'ASC'
				  );
				$categories=get_categories($args);
				  foreach($categories as $category) {
				    echo '<a href="' . get_category_link( $category->term_id ) . '' . sprintf( __( "View all posts in %s" )) . '" ' . '>' . ' '  . $category->count . ' project </a> </p> ';
				  }
				?>
			</li>
			
		</ul>
		<!-- end: meta -->
	
	</div>
	<!-- end: info -->

</li>
<!-- end: article -->	

		<!-- article -->
<li id="article-103" class="post-103 post type-post status-publish format-standard hentry category-preview tag-themeforest has-featured">
		
		
	<!-- figure -->
	<a href="../showing-off/index.html" class="post-figure">
	
		<!-- image -->		
		<img width="480" height="318" src="../wp-content/uploads/2013/06/tumblr_m9zdr7Fi5M1qli3iko1_1280-480x318.jpg" class="attachment-post-thumbnail wp-post-image" alt="tumblr_m9zdr7Fi5M1qli3iko1_1280" />	
	</a>
	<!-- end: figure -->
	
		
	<!-- info -->
	<div class="post-info">
		
		<!-- title -->
		<h2 class="post-title"><a href="index.php?cat=7">Reviews</a></h2>
		
				
		<!-- meta -->
		<ul class="meta">
			
<!-- number of posts -->
			<li><?php
				$args=array(
				  'include' => 7,
				  'orderby' => 'name',
				  'order' => 'ASC'
				  );
				$categories=get_categories($args);
				  foreach($categories as $category) {
				    echo '<a href="' . get_category_link( $category->term_id ) . '' . sprintf( __( "View all posts in %s" )) . '" ' . '>' . ' '  . $category->count . ' review </a> </p> ';
				  }
				?>
			</li>
			
		</ul>
		<!-- end: meta -->
	
	</div>
	<!-- end: info -->

</li>
<!-- end: article -->							
				
		<!-- article -->
<li id="article-101" class="post-101 post type-post status-publish format-standard hentry category-experiments category-preview category-tests tag-themeforest tag-yolo has-featured">
		
		
	<!-- figure -->
	<a href="../new-typography/index.html" class="post-figure">
	
		<!-- image -->		
		<img width="480" height="318" src="../wp-content/uploads/2013/06/tumblr_mbkbmrySe41qli3iko1_1280-480x318.jpg" class="attachment-post-thumbnail wp-post-image" alt="tumblr_mbkbmrySe41qli3iko1_1280" />	
	</a>
	<!-- end: figure -->
	
		
	<!-- info -->
	<div class="post-info">
		
		<!-- title -->
		<h2 class="post-title"><a href="index.php?cat=8">Theoretical Piece</a></h2>
						
		<!-- meta -->
		<ul class="meta">
			

<!-- number of posts -->
			<li><?php
				$args=array(
				  'include' => 8,
				  'orderby' => 'name',
				  'order' => 'ASC'
				  );
				$categories=get_categories($args);
				  foreach($categories as $category) {
				    echo '<a href="' . get_category_link( $category->term_id ) . '' . sprintf( __( "View all posts in %s" )) . '" ' . '>' . ' '  . $category->count . ' project </a> </p> ';
				  }
				?>
			</li>
			
		</ul>
		<!-- end: meta -->
	
	</div>
	<!-- end: info -->

</li>
<!-- end: article -->	
				
	</ul>
	<!-- end: post list -->
	
	

	
	
</div>
<!-- end: content -->



<!-- bottombar -->
<section id="bottom" class="content">
	
	<!-- widgets -->
	<ul class="widgets columns one-fourth">
		
		<li id="text-2" class="widget widget_text"><h4 class="widget-title">Photochrom</h4>			<div class="textwidget"><p>This is the Live Preview of <strong>Photochrom</strong>, a Responsive WordPress Theme for passionate photographers.</p>
<p><a href="http://themeforest.net/item/photochrom-a-theme-for-photography/5048541?WT.ac=new_item&WT.seg_1=new_item&WT.z_author=opendept&ref=opendept">Buy Photochrom</a></p>
</div>
		</li>		<li id="recent-posts-2" class="widget widget_recent_entries">		<h4 class="widget-title">Recent Posts</h4>		<ul>
					<li>
				<a href="../right-now-here/index.html">Right Now, Here.</a>
						</li>
					<li>
				<a href="../lights-out/index.html">Lights Out</a>
						</li>
					<li>
				<a href="../stacking-stuff/index.html">Stacking Stuff</a>
						</li>
					<li>
				<a href="../showing-off/index.html">Showing Off</a>
						</li>
					<li>
				<a href="../new-typography/index.html">New Typography</a>
						</li>
				</ul>
		</li><li id="calendar-2" class="widget widget_calendar"><div id="calendar_wrap"><table id="wp-calendar">
	<caption>April 2014</caption>
	<thead>
	<tr>
		<th scope="col" title="Monday">M</th>
		<th scope="col" title="Tuesday">T</th>
		<th scope="col" title="Wednesday">W</th>
		<th scope="col" title="Thursday">T</th>
		<th scope="col" title="Friday">F</th>
		<th scope="col" title="Saturday">S</th>
		<th scope="col" title="Sunday">S</th>
	</tr>
	</thead>

	<tfoot>
	<tr>
		<td colspan="3" id="prev"><a href="../2013/06/index.html" title="View posts for June 2013">&laquo; Jun</a></td>
		<td class="pad">&nbsp;</td>
		<td colspan="3" id="next" class="pad">&nbsp;</td>
	</tr>
	</tfoot>

	<tbody>
	<tr>
		<td colspan="1" class="pad">&nbsp;</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td>
	</tr>
	<tr>
		<td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td>
	</tr>
	<tr>
		<td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td id="today">20</td>
	</tr>
	<tr>
		<td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td>
	</tr>
	<tr>
		<td>28</td><td>29</td><td>30</td>
		<td class="pad" colspan="4">&nbsp;</td>
	</tr>
	</tbody>
	</table></div></li><li id="recent-comments-2" class="widget widget_recent_comments"><h4 class="widget-title">Recent Comments</h4><ul id="recentcomments"><li class="recentcomments">Marco on <a href="../right-now-here/comment-page-1/index.html#comment-12">Right Now, Here.</a></li><li class="recentcomments">Stefano on <a href="../right-now-here/comment-page-1/index.html#comment-11">Right Now, Here.</a></li><li class="recentcomments">Pasquale on <a href="../lights-out/comment-page-1/index.html#comment-10">Lights Out</a></li><li class="recentcomments">Stefano on <a href="../stacking-stuff/comment-page-1/index.html#comment-9">Stacking Stuff</a></li><li class="recentcomments">Pasquale on <a href="../right-now-here/comment-page-1/index.html#comment-8">Right Now, Here.</a></li></ul></li>		
	</ul>
	<!-- end: widgets -->
	
</section>
<!-- end: bottombar -->


<?php get_footer(); ?>