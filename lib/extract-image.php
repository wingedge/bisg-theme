<?php
function bi_get_post_image($returnAsTag=true){    
    global $post, $posts;
    $image_url = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $image_url = $matches [1] [0];

    //Defines a default image
    if(empty($image_url)){
        $image_url = get_bloginfo('template_url') . "/img/default.jpg";
    }

    if ($returnAsTag){
        $image_tag = '<img src="'.$image_url.'" class="img-responsive wp-post-image"/>';
    }else{
        return $image_url;
    }
}