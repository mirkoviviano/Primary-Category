<!-- Import Bootstrap just for demo purposes -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php 
    // Create the object HTML that renders the list of posts
    $horizontalListTemplate = "";
    if ( $query_posts->have_posts() ) {
        $horizontalListTemplate .= '<div class="container">';
            $horizontalListTemplate .= '<div class="row">';
                while ( $query_posts->have_posts() ) {
                    $query_posts->the_post();
                    $horizontalListTemplate .= '<div class="col-md-'.(12 / $atts['columns']).'">';
                        $horizontalListTemplate .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
                    $horizontalListTemplate .= '</div>';
                }
            $horizontalListTemplate .= '</div>';
        $horizontalListTemplate .= '</div>';
    } 
    else
        $horizontalListTemplate = 'There are no posts in the category "'.$atts['category'].'".';

    return $horizontalListTemplate;
?>