<?php

namespace App\View\Components\Nav;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class SendComment extends Component
{
  
    const MODEL_NAMES = [
        Post::class => 'post',
        Video::class => 'video' 
    ];

    public string $modelName;
    public Model $model;
   
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->modelName = self::MODEL_NAMES[$this->model::class];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
   

    public function render()
    {
        return view('components.nav.send-comment');
    }
}
