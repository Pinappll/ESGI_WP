<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Rechercher:', 'label' ) ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type to search', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Rechercher:', 'label' ) ?>" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/close.svg" alt="Close" id="close">
    </label>
</form>
