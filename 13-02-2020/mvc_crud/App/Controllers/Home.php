<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Home extends \Core\Controller
{

    protected function before()
    {
        echo "(Before!!).";
        // return FALSE;
    }

    protected function after()
    {
        echo "(After!!).";
    }

    public function indexAction()
    {
        $posts = Post::getAll();
        //echo "Hello from index action in the Home controller!";
        //View::render('Home/index.php', ['name' => 'Dave', 'colours'=> ['red', 'green', 'blue']]);
        View::renderTemplate('Home/index.html', ['name' => 'Kishan', 'posts' => $posts, 'colours' => ['red', 'green', 'blue']]);
    }
}
?>