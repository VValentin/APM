<?php

/* 
 * @author Ana
 * @created on Mar 27, 2016
 * @created at 12:03:37 PM
 */


use Phalcon\Tag;

class AddressesController extends ControllerBase
{
    public function indexAction()
    {
        Tag::setTitle('Addresses');
        Parent::initialize();
    }
}