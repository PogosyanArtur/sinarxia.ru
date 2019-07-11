<?php 
    $contacts =  get_field("contacts","option");    
?>

<div class="list-group">
    <h3 class="list-group-item bg-primary-main text-white font-weight-bold ">Контакты</h3>
    
    <?php foreach($contacts  as $contact ) : ?>

        <a href="
                <?php 
                    switch ( $contact['acf_fc_layout'] ) {
                        case 'telephone':
                            echo "tel:";
                            break;
                        case 'mail':
                            echo "mailto:";
                            break;
                        default:
                            echo "";
                    };
                    echo $contact['link']; 
                ?>"          
            class="list-group-item list-group-item-action"
        >
            <div class="d-flex align-items-center">

                <?php if ( $contact['icon'] ) : ?>
                    <div class="w-35px mr-3 text-accent-main">
                        <svg width="35" height="35">
                            <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#' . $contact['icon'] ) ?> " ></use>
                        </svg>
                    </div>
                <?php endif; ?>

                <div>
                    <h4 class="text-accent-main h5"> <?php  echo $contact['title'] ?>  </h4>
                    <p class="text-common-700 m-0"> <?php echo  $contact['name'] ?> </p>
                </div>
            </div>
        </a>

    <?php endforeach; ?>

</div>