<!-- Import Bootstrap just for demo purposes -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php 
    // Create the object HTML that renders the list of posts
    $simpleListTemplate = '';
    if ( $query_posts->have_posts() ) {
        $simpleListTemplate .= '<div class="container">';
        $simpleListTemplate .= '<div class="row">';
            $simpleListTemplate .= '<ul>';
                while ( $query_posts->have_posts() ) {
                    $query_posts->the_post();
                    $simpleListTemplate .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                }
            $simpleListTemplate .= '</ul>';
    } 
    else
        $simpleListTemplate = 'There are no posts in the category "'.$atts['category'].'".';
    $simpleListTemplate .= '</div>';
    $simpleListTemplate .= '</div>';   
    
    return $simpleListTemplate;
?>
