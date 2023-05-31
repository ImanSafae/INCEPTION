<?php
/**
 * Goto Top functions
 *
 * @since Puskar 1.0.0
 *
 */

if (!function_exists('puskar_go_to_top')) :
    function puskar_go_to_top()
    {
    ?>
    <div id="scrollUp">
        <i class="ti-arrow-up"></i>
    </div>
<?php
    } endif;
add_action('puskar_go_to_top_hook', 'puskar_go_to_top', 10, 1);