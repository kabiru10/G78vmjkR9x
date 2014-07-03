<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="no-comments"><?php _e('This post is password protected. Enter the password to view comments.', 'Avenir'); ?></p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>

 	<div class="comment">
	
		<div>
			<?php comments_number(__('No Comments', 'Avenir'), __('One Comment', 'Avenir'), __('% Comments', 'LeeAvenir'));?>
		</div>

		<!-- Comment list -->
		<div class="post">
			<?php wp_list_comments('type=comment&callback=avenir_comments'); ?>
		</div>
		<!-- Comment list::END -->
		
		
	</div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p><?php _e('Comments are closed.', 'Avenir'); ?></p>

	<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" class="">

	<?php if ( is_user_logged_in() ) : ?>
				<p><?php _e('Logged in as', 'Avenir'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
					<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out &raquo;', 'Avenir'); ?></a></p>
			<textarea placeholder="Message"></textarea><br/>
        	<button type="submit">Submit</button>

	<?php else: ?>
        <div>
            <input type="text" placeholder="Name" class=""/>
            <input type="text" placeholder="Email" class=""/>
            <input type="text" placeholder="Phone" class=""/>
        </div>
        <textarea placeholder="Message"></textarea><br/>
        <button type="submit">Submit</button>
    </form>
	<?php endif; ?>


<?php endif; ?>

