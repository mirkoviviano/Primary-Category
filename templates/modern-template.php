<!-- Import Bootstrap just for the demo purposes -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- Some custom CSS for demo purposes -->
<style type="text/css">
    .bgImage{
        background-size: cover; 
        height: 500px; 
        width: 100%; 
    }
    .item {
        margin-bottom: 2em
    }
    h5 a{
        color: #000;
    }
</style>

<?php 
    // Create the object HTML that renders the list of posts
    $modernTemplate = "";
    if ( $query_posts->have_posts() ) {
        $modernTemplate .= '<div class="container">';
            while ( $query_posts->have_posts() ) {
                $modernTemplate .= '<div class="row item">';
                $query_posts->the_post();
                    if(has_post_thumbnail())
                        $modernTemplate .= '<div class="col-md-6 bgImage" style="background-image: url('.get_the_post_thumbnail_url().');"></div>';
                    else
                        $modernTemplate .= '<div class="col-md-6 bgImage" style="background-image: url(http://via.placeholder.com/500x500);"></div>';
                    
                    $modernTemplate .= '<div class="col-md-6">';
                        $modernTemplate .= '<h1>'.get_the_title().'</h1>';
                        $modernTemplate .= '<h5><a class="ast-custom-button" href="' . get_permalink() . '">View more</a></h5>';
                    $modernTemplate .= '</div>';
                $modernTemplate .= '</div>';
                }
        $modernTemplate .= '</div>';
    } 
    else
        $modernTemplate = 'There are no posts in the category "'.$atts['category'].'".';

    return $modernTemplate;
?>