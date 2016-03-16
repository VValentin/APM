<?php

/* 
 * @author vvaduva
 * @created on Mar 16, 2016
 * @created at 3:23:08 PM
 */

use Phalcon\Tag;

class DashboardController extends ControllerBase
{
    public function indexAction()
    {
        Tag::setTitle('Dashboard');
        Parent::initialize();
    }
}