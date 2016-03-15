<?php

/* 
 * @author vvaduva
 * @created on Mar 15, 2016
 * @created at 12:06:46 PM
 */

use Phalcon\Tag;

class SigninController extends ControllerBase
{
    public function indexAction()
    {
        Tag::setTitle('Signin');
        $this->assets->collection('additional')->addCss('css/signin.css');
        Parent::initialize();
    }
}

