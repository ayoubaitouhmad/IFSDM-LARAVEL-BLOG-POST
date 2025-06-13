<?php

namespace App\View\Components;

use App\Enums\OrderBy;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Articles extends Component
{

    public $articles;
    public bool $showHeader;
    public $users;
    public $orderByOptions;
    public int $activeFilters = 0 ;

    /**
     * @param $articles
     * @param bool $showHeader
     */
    public function __construct($articles, int $activeFilters = 0, bool $showHeader = false )
    {
        $this->articles = $articles;
        $this->showHeader = $showHeader;
        if($this->showHeader){
            $this->users = User::getAllForSelect();
            $this->orderByOptions = OrderBy::toArray();
            $this->activeFilters = $activeFilters;
        }else{
            $this->users = collect([]);
        }
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.articles');
    }
}
