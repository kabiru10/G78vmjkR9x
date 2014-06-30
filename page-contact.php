<?php
/*
  Template Name: Contact Page
 */
?>
<?php
if (isset($_POST['submit'])) {

    if (trim($_POST['comment_name']) == '') {
        $hasError = true;
    } else {
        $name = trim($_POST['comment_name']);
    }

    if (trim($_POST['phone']) == '') {
        $hasError = true;
    } else {
        $phone = trim($_POST['phone']);
    }

    if (trim($_POST['email']) == '') {
        $hasError = true;
    } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if (trim($_POST['comment']) == '') {
        $hasError = true;
    } else {
        if (function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comment']));
        } else {
            $comments = trim($_POST['comment']);
        }
    }


    // Send mail if no Errors
    if (!isset($hasError)) {
        $emailTo = get_option('avenir_email');
        if (!isset($emailTo) || ($emailTo == '')) {
            $emailTo = get_option('admin_email');
        }

        $body = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nComments:\n $comments";
        $headers = 'From: ' . get_bloginfo('name') . ' <' . $emailTo . '>' . "\r\n" . 'Reply-To: ' . $email;

        $emailSent = wp_mail($emailTo, "Enquiries from Sites", $body, $headers);
    }
}
?>



    <?php get_header(); ?>
<div class="w500 h150 subtitle central">
<?php if ((is_page() || is_single()) && !is_front_page()): ?>
        <div class="f60"><?php the_title(); ?></div>
<?php endif; ?>
</div>
</div>
<div class="shape grey"></div>
<br>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" class="<?php post_class('two_cols central pt50'); ?>">
            <div class="blog">
                <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
                <div>

                </div>
                <div class="clear"></div>
                <div class="f14 gray">
        <?php the_content(); ?>
                </div>


                <div id="address" class="central__ tcenter">
                    <?php if (get_option('avenir_address')) : ?>
                        <div class="f30"><?php echo get_option('avenir_address') ?></div>
                        <!-- <div class="f30">London House, 400 Plot, NY, USA</div> -->
                        <?php endif; ?>
                    <ul>
                        <?php if (get_option('avenir_phone')): ?>
                            <li><?php echo get_option('avenir_phone') ?></li>
                        <?php endif ?>
                        <?php if (get_option('avenir_email')): ?>
                            <li><?php echo get_option('avenir_email') ?></li>
                        <?php endif; ?>
        <?php if (get_option('avenir_website')): ?>
                            <li class="last"><?php echo get_option('avenir_website') ?></li>
        <?php endif; ?>
                    </ul>
                    <div class="clear"></div>
                    <div class="title">Contact Form</div>
                    <form class="">
                        <div>
                            <input type="text" name="comment_name" placeholder="Name" class="" required/>
                            <input type="text" name="email" placeholder="Email" class="" required/>
                            <input type="text" name="phone" placeholder="Phone" class=""/>
                        </div>
                        <textarea name="comment" placeholder="Message"></textarea><br/>
                        <button type="submit" name="submit">Submit</button>
                    </form>
                </div>

            </div>

        </div>
    <?php endwhile; ?>

<?php else: ?>
    <p><?php _e('No Pages  Were Found.', 'Avenir'); ?></p>
<?php endif; ?>

</div>

</section>
<?php get_footer(); ?>