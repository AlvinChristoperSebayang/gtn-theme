<?php

// hook for post load
add_action('wp',function()
{
    global $wp_query;
    return $wp_query->post;      
});
