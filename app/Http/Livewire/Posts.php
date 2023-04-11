<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\counter;

class Posts extends Component
{
    public $posts, $title, $body, $post_id;
    public $counter = 0;
    public function render()
    {
        $this->counter = counter::select('count')->first()->count;
        return view('livewire.posts');
    }

    public function tambahCounter()
    {
        if(counter::first() == null)
        {
            $updateCount = new counter;
            $updateCount->count = 1;
            $updateCount->save();
        }
        $updateCount = counter::find(1);
        $updateCount->count = ($updateCount->count) + 1;
        $updateCount->save();
    }

    public function clearCounter()
    {
        if(counter::first() == null)
        {
            $updateCount = new counter;
            $updateCount->count = 0;
            $updateCount->save();
        }
        $updateCount = counter::find(1);
        $updateCount->count = 0;
        $updateCount->save();
    }
}
