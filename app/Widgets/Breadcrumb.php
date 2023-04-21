<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Breadcrumb extends AbstractWidget
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
        return view('widgets.breadcrumb', [
            'config' => (object)$this->config,
        ]);
    }
}
