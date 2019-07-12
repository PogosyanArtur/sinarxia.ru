<form class="form-inline py-2 justify-content-end" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

    <input class="form-control mr-sm-2" name="s" value="<?php echo get_search_query() ?>" type="search" placeholder="Поиск" aria-label="Поиск">
    <button class="btn btn-primary-light my-2 my-sm-0" type="submit">Поиск</button>
    
</form>
