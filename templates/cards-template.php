<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php 
    $cardTemplate = "";
    if ( $query_posts->have_posts() ) {
        $cardTemplate .= '<div class="container">';
            $cardTemplate .= '<div class="row">';
                while ( $query_posts->have_posts() ) {
                    $query_posts->the_post();
                    $cardTemplate .= '<div class="col-md-'.(12 / $atts['columns']).' card">';
                        if(has_post_thumbnail())
                            $cardTemplate .= '<img src="'.get_the_post_thumbnail_url().'" class="card-img-top" alt="'.get_the_title().'"/>';
                        else
                            $cardTemplate .= '<img src="http://via.placeholder.com/200x200" class="card-img-top" alt="'.get_the_title().'">';
                        $cardTemplate .= '<div class="card-body">';
                            $cardTemplate .= '<h5 class="card-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
                        // $cardTemplate .= '<p>Architect & Engineer</p>';
                        $cardTemplate .= '</div>';
                    $cardTemplate .= '</div>';
                }
            $cardTemplate .= '</div>';
        $cardTemplate .= '</div>';
    } 
    else
        $cardTemplate = 'There are no posts in the category "'.$atts['category'].'".';

    return $cardTemplate;
?>