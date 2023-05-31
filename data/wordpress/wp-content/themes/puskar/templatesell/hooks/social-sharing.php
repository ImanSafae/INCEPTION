<?php
/**
 * Social Sharing Hook *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('puskar_social_sharing')) :
    function puskar_social_sharing($post_id)
    {
        $puskar_url = get_the_permalink($post_id);
        $puskar_title = get_the_title($post_id);
        $puskar_image = get_the_post_thumbnail_url($post_id);
        
        //sharing url
        $puskar_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $puskar_title . '&url=' . $puskar_url);
        $puskar_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $puskar_url);
        $puskar_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $puskar_url . '&media=' . $puskar_image . '&description=' . $puskar_title);
        $puskar_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $puskar_title . '&url=' . $puskar_url);
        
        ?>
        <div class="meta-share">
            <span class="btn-text">Share <i class="fa fa-share-alt ml-2"></i></span>

            <ul class="post-share">
                <li><a target="_blank" href="<?php echo $puskar_facebook_sharing_url; ?>"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="<?php echo $puskar_twitter_sharing_url; ?>"><i
                            class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="<?php echo $puskar_pinterest_sharing_url; ?>"><i
                            class="fa fa-pinterest"></i></a></li>
                <li><a target="_blank" href="<?php echo $puskar_linkedin_sharing_url; ?>"><i class="fa fa-linkedin"></i></a></li>
            </ul>

        </div>
        <?php
    }
endif;
add_action('puskar_social_sharing', 'puskar_social_sharing', 10);