<!-- responses -->
<section id="comments" class="content wide">
	
	<!-- comments -->
	<div class="columns half">
		
		<!-- form -->
		<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' ) ? " aria-required='true'" : false;
	
		comment_form(
			array(
				'title_reply' => get_option( 'comment_registration' ) && ! is_user_logged_in() ? null : __( 'Leave a reply', 'openframe' ),
				'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . esc_attr( __( 'Your Message', 'openframe' ) ) . '" aria-required="true"></textarea></p>',
				'comment_notes_before' => null,
				'comment_notes_after' => null,
				'cancel_reply_link' => __( 'Nevermind..', 'openframe' ),
				'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'You are signed in as %s. %s', 'openframe' ), '<a href="' . admin_url( 'profile.php' ) . '">' . $user_identity . '</a>', '<a href="' . wp_logout_url() . '">' . __( 'Logout', 'openframe' ) . '</a>' ) . '</p>',
				'fields' => 
					array(
						'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="' . esc_attr( __( 'Your Name', 'openframe' ) ) . '" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" ' . $req . ' /></p>',
						'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" placeholder="' . esc_attr( __( 'Your@Email.com', 'openframe' ) ) . '" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" ' . $req . ' /></p>',
						'url' => '<p class="comment-form-url"><input id="url" name="url" type="text" placeholder="' . esc_attr( __( 'Your Website or Profile', 'openframe' ) ) . '" value="' . esc_url( $commenter[ 'comment_author_url' ] ) . '" /></p>'
					)
			),
			$post->ID
		);
		?>
		<!-- end: form -->
		
		<!-- list -->
		<div id="comments-read">
			
			<!-- comment title -->
			<h3 id="total-comments"><?php comments_number( __( 'No Responses', 'openframe' ), __( '1 Response', 'openframe' ), __( '% Responses', 'openframe' ) ); ?></h3>
			
			<?php if ( have_comments() ) : ?>
				
			<!-- commentlist -->
			<ul class="commentlist">
			
				<?php wp_list_comments( array( 'callback' => 'photochrom_commentlist', 'style' => 'ul' ) ); ?>
						
			</ul>
			<!-- end: commentlist -->
			
			<?php if ( get_option( 'page_comments' ) && get_previous_comments_link() && $i = get_query_var( 'cpage' ) ) : ?>
						
			<!-- pagination -->
			<span class="more more-comment aligncenter">
			
				<!-- action -->
				<a href="<?php echo esc_url( get_comments_pagenum_link( intval( $i ) > 1 ? intval( $i ) - 1 : 0 ) ); ?>" class="action" title="<?php esc_attr_e( __( 'Load more responses to this Article', 'openframe' ) ); ?>" data-title="<?php esc_attr_e( __( 'Show More', 'openframe' ) ); ?>" data-wait="<?php esc_attr_e( __( 'Loading..', 'openframe' ) ); ?>"></a>
			
			</span>
			<!-- end: pagination -->
			
			<?php endif; ?>
			
			<?php endif; ?>
			
		</div>
		<!-- end: list -->
	
	</div>
	<!-- end: columns -->

</section>
<!-- end: responses -->