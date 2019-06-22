<?php
/**
 * MT Blog functions and definitions
 *
 * @link https://mightythemes.com
 *
 * @package Mighty Themes
 * @subpackage MT_Blog
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<?php 
// Comments form
global $aria_req;
$comments_args = array(
    // remove "Text or HTML to be displayed after the set of comment fields"
    'title_reply' => '<h4 class="section-heading uppercase"><span>' . esc_html__('Leave a Comment', 'mtblog') . '</span></h4>',
    'id_submit'         => 'submit',
    'class_submit'      => 'btn btn-primary col-md-offset-2',
    'name_submit'       => 'submit',
    'class_form'      => 'comment row',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'fields' => $fields =  array(
        'author' =>
            '<div class="col-md-4">
                <div class="form-group">
                    <label for="author">Name</label>
                    <input id="author" name="author" type="text" class="form-control" placeholder="' . esc_html__('Name (Required)', 'mtblog') . '" value="' . esc_attr($commenter['comment_author']) . '" size="19"' . $aria_req . ' />
                </div>
            </div>',
        'email' =>
            '<div class="col-md-4">
                <div class="form-group">
                    <label for="emailaddress">Email address</label>
                    <input id="emailaddress" name="email" class="form-control" placeholder="' . esc_html__('Email Address (Required)', 'mtblog') . '" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="19"' . $aria_req . ' />
                </div>
            </div>',
        'url' =>
            '<div class="col-md-4">
                <div class="form-group">
                    <label for="website">Website</label>
                    <input id="website" name="url" type="text" class="form-control" placeholder="' . esc_html__('Website', 'mtblog') . '" value="' . esc_attr($commenter['comment_author_url']) . '" size="19" />
                </div>
            </div>',
    ),
    'comment_field' => 
        '<div class="col-md-12">
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea class="form-control" id="comment" name="comment" placeholder="' . esc_html__('Comment', 'mtblog') . '" cols="45" rows="8" aria-required="true"></textarea>
            </div>
        </div>',
    'label_submit' => esc_html__('Post Comment', 'mtblog'),
);
?>

<div id="comment-box" class="comment-box">
    <div class="row">
        <div class="col-md-12">
            <?php comment_form($comments_args); ?>

            <?php 
            // Comment list
            if (have_comments()) : ?>
                <div id="comments" class="comments-area single-section clearfix">
                    <h3 class="comments-count section-heading uppercase">
                        <?php esc_html_e('Recent Comments', 'mtblog'); ?>
                    </h3>

                    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : 
                        ?>
                        <nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" class="commentnavi pagination">
                            <h2 class="screen-reader-text">
                                <?php esc_html_e('Comments navigation', 'mtblog'); ?>
                            </h2>
                            <div class="nav-links">
                                <?php paginate_comments_links(); ?>
                            </div>
                        </nav>
                    <?php endif; 
                ?>

                
                    <ol class="commentlist">
                        <?php
                        wp_list_comments(array(
                            'type'        => 'comment',
                            'short_ping'  => true,
                            'avatar_size' => 60,
                        ));
                        ?>
                        <?php
                        wp_list_comments(array(
                            'type'        => 'pingback',
                            'short_ping'  => true,
                            'avatar_size' => 60,
                        ));
                        ?>
                    </ol>
                
                    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : 
                        ?>
                        <nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" class="commentnavi pagination">
                            <h2 class="screen-reader-text">
                                <?php esc_html_e('Comments navigation', 'mtblog'); ?>
                            </h2>
                            <div class="nav-links">
                                <?php paginate_comments_links(); ?>
                            </div>
                        </nav>
                    <?php endif;
                ?>
                </div><!-- #comments -->

            <?php else : 
                ?>

                <?php if ('open' == $post->comment_status) : ?>
                    <!-- If comments are open, but there are no comments. -->
                <?php else : 
                ?>
                    <!-- If comments are closed. -->
                    <?php echo 'Comments are disabled.'; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>



