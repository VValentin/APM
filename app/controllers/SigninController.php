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
    
    private function _createUserSession(Users $user) 
    {
        $message = 'Welcome, ' . $user->first_name;
        
        switch ($user->type) {
            case 'guest':
                $landingPage = 'index/index';
                break;
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

        $this->flash->success($message);
        $this->response->redirect($landingPage);
    }
    
    public function doSigninAction()
    {
        if($this->security->checkToken() == false) {
            $this->flash->error('Invalid CSRF token');
            $this->response->redirect("signin/index");
            return;
        }
        
        $this->view->disable();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $landingPage = '';
        $message = '';
        
        $user = Users::findFirstByEmail($email);
        
        if ($user) {
            if($this->security->checkHash($password, $user->password)) {
                $this->_createUserSession($user);
                return;
            }
        }
        
        $this->flash->error('Incorrect credentials');
        $this->response->redirect('signin/index');
    }
    
    public function registerAction()
    {
        Tag::setTitle('Create account');
        $this->assets->collection('additional')->addCss('css/signin.css');
    }
    
    public function doRegisterAction()
    {
        if($this->security->checkToken() == false) {
            $this->flash->error('Invalid CSRF token');
            $this->response->redirect("signin/register");
            return;
        }
        
        $this->view->disable();
        
        $firstName = $this->request->getPost('first_name');
        $lastName = $this->request->getPost('last_name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');
        
        if ($password !== $confirmPassword) {
            $this->flash->error('Passwords do not match');
            $this->response->redirect("signin/register");
            return;
        }
        
        $user = new Users();
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->email = $email;
        $user->password = $this->security->hash($password);
        $user->type = 'user';
        
        $result = $user->save();
        
        if(!$result) {
            $output = [];
            foreach($user->getMessages() as $message) {
                $output[] = $message;
            }
            $output = implode(', ', $output);
            $this->flash->error($output);
            $this->response->redirect("signin/register");
            return;
        }
        
        $this->_createUserSession($user);
        return;
        
    }
}

