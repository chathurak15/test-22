<?php
$uri = $_SERVER['REQUEST_URI'];

$uri = trim($uri,'/');

include 'controllers/Posts.php';

$uriParts = explode('/', $uri);

// dd($uriParts);

switch($uriParts[0]){
    case '':
        p('home');
        break;
    case 'posts':
        $posts = new Posts();
        if(!empty($uriParts[1])){
            switch($uriParts[1]){
                case 'add':
                    $posts = new Posts();
                    $posts->add();
                    break;
                case 'save':
                    $posts = new Posts();
                    $posts->save();
                    break;
                case 'edit':
                    $posts->edit($uriParts[2]);
                    break;
                case 'update':
                    $posts->update($uriParts[2]);
                    break;
                default:
                    $posts->show($uriParts[1]);
                    break;
            }
        }
        else {
            return $posts->index();
        }
        break;
    default:
    

}
