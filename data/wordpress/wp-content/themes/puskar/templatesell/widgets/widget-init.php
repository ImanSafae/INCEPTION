<?php

if ( ! function_exists( 'puskar_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function puskar_load_widgets() {

        // Highlight Post.
        register_widget( 'Puskar_Featured_Post' );

        // Author Widget.
        register_widget( 'Puskar_Author_Widget' );
    }
endif;
add_action( 'widgets_init', 'puskar_load_widgets' );


