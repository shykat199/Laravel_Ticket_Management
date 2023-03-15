<?php
use App\Models\BlogPost;
function blogPosts()
{
    $blogPosts=BlogPost::select('post_title','post_description','post_image','created_at')
        ->offset(0)
        ->limit(3)
        ->get();
    return $blogPosts;
}
