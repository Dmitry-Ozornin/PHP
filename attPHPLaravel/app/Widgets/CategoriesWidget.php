<?php

namespace App\Widgets;

use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;

class CategoriesWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        $count = Category::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-news',
            'title' => 'Total Categories',
            'text' => "There are {$count} categories in the database.",
            'color' => 'primary',
            'button' => [

                'text' => 'View All Categories',
                'link' => ' ',
            ],
            'image' => 'news-bg.png',
        ]));
    }

    public function shouldBeDisplayed()
    {
        return true; // Always display the widget
    }

    //  return view('widgets.categories_widget', [
    //      'config' => $this->config,
    //  ]);

}
