<?php

namespace App\View\Components;

use App\Models\Article;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticleCard extends Component
{

    public bool $showCrudButtons;


    /**
     * Create a new component instance.
     */
    public function __construct(public Article $article , bool $showCrudButtons = false)
    {
        $this->showCrudButtons = $showCrudButtons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article-card');
    }
}
