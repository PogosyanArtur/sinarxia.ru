<?php 
    $old_price  = $sidebar_price_var_object['old_price'];
    $new_price  = $sidebar_price_var_object['new_price'];
    $unit       = $sidebar_price_var_object['unit'];
;?>


<div>             
    <p class="border  text-accent-main m-0 p-4 font-weight-bold rounded-top h5 text-center">
        Цена 
        <del class="text-common-500 font-weight-normal"><?php if( $old_price )(esc_html_e( $old_price )) ;?></del> 
        <?php esc_html_e( $new_price ) ;?> руб./<?php esc_html_e( $unit ) ;?>
    </p>
    <p class="bg-primary-main rounded-bottom text-common-white font-italic text-center m-0 p-2"> в том числе НДС 20% </p>
</div>