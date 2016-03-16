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
    
    public function doSigninAction()
    {
        $this->view->disable();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $landingPage = '';
        
        $user = Users::findFirst([
            "email = :email: AND password = :password:",
            "bind" => [
                "email" => $email,
                "password" => $password
            ]
        ]);
        
        if($user) {
            switch ($user->type) {
                case 'user':
                    $landingPage = 'dashboard/index';
                    break;
                case 'admin':
                    $landingPage = 'admin/index';
                    break;
                default:
                    $landingPage = 'signin/create';
                    break;
            }
            
            $this->session->set('id', $user->id);
            $this->session->set('role', $user->type);
            
            $this->flash->success('You are logged in!');
            $this->response->redirect($landingPage);
            
            return;
        }
        
        $this->flash->error('Incorrect credentials');
        $this->response->redirect('signin/index');
    }
    
    public function createAction()
    {
        
    }
}

