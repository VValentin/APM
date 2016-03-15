<?php

/* 
 * @author vvaduva
 * @created on Mar 15, 2016
 * @created at 5:16:28 PM
 */

use Phalcon\Tag;

class AdminController extends ControllerBase
{
    public function indexAction()
    {
        Tag::setTitle('Admin');
        Parent::initialize();
    }
}

