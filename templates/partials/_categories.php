<?php
    $without = get_term_by('name', 'Sem categoria', 'product_cat');
    $args = [
        'taxonomy'	=> "product_cat",
        'parent' 		=> 0,
        'exclude' 	=> [$without->term_id]
    ];
    $product_categories = get_terms($args);
    
    if ( !wp_is_mobile() ) :
        echo '<ul class="list-pages d-flex">';
        foreach ($product_categories as $categorie) {
            $term_link = get_term_link( $categorie );
            $terms = get_terms( ['hide_empty' => 0, 'parent' => $categorie->term_id, 'taxonomy' => "product_cat"] );
            if (count($terms) > 0) :
                // echo '<pre>'. print_r($categorie, 1) . '</pre>';
                echo '<li><a href="'. esc_url( $term_link ) .'">'.$categorie->name.'</a>';
                    echo '<div class="collapse bg" id="nav_'.sanitize_title( $categorie->name).'">';
                        echo '<ul class="nav-tax">';
                                foreach($terms as $termk=>$term){
                                    echo '<li><a  href="'. esc_url( get_term_link( $term) ) .'">'.$term->name.'</a></li>';
                                }
                        echo '</ul>';
                    echo '</div>';
                echo '</li>';
            else:
                echo '<li><a  href="'. esc_url( $term_link ) .'">'.$categorie->name.'</a></li>';
            endif;
        }
        echo '</ul>';
    
    else :
        echo '<div class="dropdown-category">',
'<select id="category" class="list-group">';
        foreach ($product_categories as $categorie) {
            $term_link = get_term_link( $categorie );
            $terms = get_terms(['hide_empty'=>0,'parent'=>$categorie->term_id, 'taxonomy' => "product_cat"]);
            echo '<option value="'. esc_url( $term_link ) .'">'.$categorie->name.'</option>';
        }
        echo '</select></div>';
    endif;
?>
<script>
    $(document).ready(function () {
        $("select#category").on("change", function(value){
            var This = $(this);
            var selectedD = $(this).val();
            window.location.href=selectedD;
        });
    });
</script>