<ul class="visitor">
    <?php
        $myaccount = get_page_by_title( 'Minha Conta' );
        if (is_user_logged_in()) {
            $user = wp_get_current_user();
            echo '<li><a href="'.wc_get_page_permalink('myaccount').'"><i class="far fa-user-circle"></i> Bem vindo, <strong class="ml-1">'.$user->display_name.'</strong></a></li>';
        } else {
    ?>
        <li><a href="<?php echo get_permalink($myaccount); ?>"><i class="far fa-user-circle"></i> Acesse sua conta // </a></li>
        <li><a href="<?php echo get_permalink($myaccount); ?>">Cadastre-se</a></li>
    <?php } ?>
</ul>