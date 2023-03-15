<?php
use App\Models\BlogPost;
use App\Models\BusDestination;
function blogPosts()
{
    $blogPosts=BlogPost::select('post_title','post_description','post_image','created_at')
        ->offset(0)
        ->limit(3)
        ->get();
    return $blogPosts;
}
function recentTickets()
{
    $blogPosts=BusDestination::select('starting_point','arrival_point','ticket_price')
        ->offset(0)
        ->limit(3)
        ->get();
    return $blogPosts;
}
