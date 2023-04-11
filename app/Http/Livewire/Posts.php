<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{
    public $posts, $title, $body, $post_id;
    public $counter = 0;
    public function render()
    {
        return view('livewire.posts');
    }

    public function tambahCounter()
    {
        $this->counter++;
    }
}
