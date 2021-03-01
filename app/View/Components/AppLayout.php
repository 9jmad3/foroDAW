<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Http\Controller\PostController;
use App\Models\Post;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // $posts = Post::get();
        return view('layouts.app');
    }
}
