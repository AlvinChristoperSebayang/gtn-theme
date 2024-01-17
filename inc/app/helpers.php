<?php

if (!function_exists('get_post_id_by_slug')) {
    function get_post_id_by_slug($slug)
    {
        $post = get_page_by_path($slug);

        if ($post) {
            return $post->ID;
        } else {
            return null;
        }
    }
}

/**
 * Post Functions
 */


 if (!function_exists('mcd_timeago')) {
    /**
     * Adds custom date times ago.
     *
     * @param string date date on post.
     * @return string
     */
        function mcd_getTimeAgo($date)
        {
            $timestamp = strtotime($date);
    
            $strTime = array("sec", "min", "hour", "day", "month", "year");
            $length = array("60","60","24","30","12","10");
    
            $currentTime = time();
            if($currentTime >= $timestamp) {
                $diff     = time()- $timestamp;
                for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                $diff = $diff / $length[$i];
                }
    
                $diff = round($diff);
                return $diff . " " . $strTime[$i] . "(s) ago";
            }
        }
    }
    
    if (!function_exists('mcd_getUserSlug')) {
    /**
     * Adds custom user or author slug.
     *
     * @param string user_id user or author id.
     * @param string author_nicename user or author nicename.
     * @return string
     */
        function mcd_getUserSlug($user_id, $author_nicename = ''){
            global $wp_rewrite;
    
        $author_id = (int) $user_id;
        $link      = $wp_rewrite->get_author_permastruct();
    
        if ( empty( $link ) ) {
            $file = home_url( '/' );
            $link = $file . '?author=' . $author_id;
        } else {
            if ( '' === $author_nicename ) {
                $user = get_userdata( $author_id );
                if ( ! empty( $user->user_nicename ) ) {
                    $author_nicename = $user->user_nicename;
                }
            }
            $link = str_replace( '%author%', $author_nicename, $link );
            $link = home_url( user_trailingslashit( $link ) );
        }
    
        /**
         * Filters the URL to the author's page.
         *
         * @since 2.1.0
         *
         * @param string $link            The URL to the author's page.
         * @param int    $author_id       The author's ID.
         * @param string $author_nicename The author's nice name.
         */
        $link = apply_filters( 'author_link', $link, $author_id, $author_nicename );
    
        return $link;
        }
    }
    
    
    if (!function_exists('mcd_createSlug')) {
    /**
     * function create string slug.
     *
     * @param string str string text.
     * @return string
     */
         function mcd_createSlug($str, $delimiter = '-'){
            $unwanted_array = ['ś'=>'s', 'ą' => 'a', 'ć' => 'c', 'ç' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ź' => 'z', 'ż' => 'z',
                'Ś'=>'s', 'Ą' => 'a', 'Ć' => 'c', 'Ç' => 'c', 'Ę' => 'e', 'Ł' => 'l', 'Ń' => 'n', 'Ó' => 'o', 'Ź' => 'z', 'Ż' => 'z']; // Polish letters for example
            $str = strtr( $str, $unwanted_array );
        
            $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
            return $slug;
        }
    }

function parseToVue($data)
{
    return htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8');
}
