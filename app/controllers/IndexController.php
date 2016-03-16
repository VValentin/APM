<?php

/* 
 * @author vvaduva
 * @created on Mar 15, 2016
 * @created at 12:01:22 PM
 */

use Phalcon\Tag;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        Tag::setTitle('Home');
        Parent::initialize();
    }
    
    public function signoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('index/');
    }
}

