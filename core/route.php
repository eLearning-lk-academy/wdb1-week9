<?php
require 'controllers/posts.php';
$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
//split the url into an array
$urls = explode('/', $url);

switch ($urls[1]) {
    case 'add':
        $posts = new Posts();
        $posts->addPost();
        break;
    case 'save':
        $posts = new Posts();
        $posts->savePost();
        break;
    case 'edit':
        $posts = new Posts();
        $posts->editPost($urls[2]);
        break;
    case 'update':
        $posts = new Posts();
        $posts->updatePost();
        break;
    case 'delete':
        $posts = new Posts();
        $posts->deletePost($urls[2]);
        break;
    default:
        $posts = new Posts();
        $posts->getAllPosts();
        break;

}