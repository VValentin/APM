<?php

use Phalcon\Mvc\Controller;
use Phalcon\Tag;

class ControllerBase extends Controller
{
    public function initialize() {
        
        Tag::prependTitle('APM | ');
        
        // Add CSS
        $this->assets
            ->collection('style')
            ->addCss('css/bootstrap.min.css', false, false)
            ->addCss('css/app.css')
            ->setTargetPath('css/production.css')
            ->setTargetUri('css/production.css')
            ->join(true)
            ->addFilter(new \Phalcon\Assets\Filters\Cssmin());
        
        // Add JS
        $this->assets
                ->collection('js')
                ->addJs('js/jquery-2.2.1.min.js', false, false)
                ->addJs('js/bootstrap.min.js', false, false)
                ->setTargetPath('js/production.js')
                ->setTargetUri('js/production.js')
                ->join(true)
                ->addFilter(new \Phalcon\Assets\Filters\Jsmin());
    }
}
