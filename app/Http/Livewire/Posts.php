<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\counter;

class Posts extends Component
{
    public $posts, $title, $body, $post_id;
    public $counter = 0;
    public $testd = '';
    public $arr = [];
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

        // $ccs = 0;
        // return 'arr length :' . count($this->arr);
        for($i = 0; $i < count($this->arr); $i++)
        {
            $ch = curl_init('http://intranet.b2be.com/bcs/uploads/avatar/' . $this->arr[$i] . '');
            $fp = fopen(storage_path('app/downloaded/' . $this->arr[$i] . ''), 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);
            // $ccs++;
        }
        // return $ccs;
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

        $file = fopen(storage_path('app/downloaded/sqlquery.txt'), 'r');
        $counss = 0;
        if ($file) {
            while (($line = fgets($file)) !== false) {
                // process each line here
                if($counss != 0)
                {
                    // return $line;
                    $pattern = '/uploads\/avatar\/(.+?)\'/';
                    preg_match($pattern, $line, $matches);
                    // return $matches[1];
                    if (isset($matches[1])) {
                        $this->testd = $matches[1];
                        array_push($this->arr, $matches[1]);
                    }
                }
                $counss++;
            }

            fclose($file);
        }
    }
}
