<?php

namespace App\Widgets;

use App\Http\Controllers\ProductController;
use Arrilot\Widgets\AbstractWidget;
use App\Models\Product;


class ProductsWidget extends AbstractWidget
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

        $count = Product::count();

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-news',
            'title' => 'Total Products',
            'text' => "There are {$count} products in the database.",
            'color' => 'primary',
            'button' => [

                'text' => 'View All Products',
                'link' => ' ',
            ],
            'image' => 'news-bg.png',
        ]));
    }

    public function shouldBeDisplayed()
    {
        return true; // Always display the widget
    }
}
