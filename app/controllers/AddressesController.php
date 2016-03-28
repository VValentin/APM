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
        
        $addresses = Addresses::find();
        
        if(count($addresses) > 0) {
            $this->view->setVar('addresses_available', true);
        } else {
            $this->view->setVar('addresses_available', false);
        }
    }
    
    public function getAddressesAction() 
    {
        $addresses = Addresses::find();
        $response = array();
        
        if(count($addresses) > 0) {
            $response = $addresses->toArray();
        } 
        
        $this->response->setContentType('application/json');
        $this->response->setJsonContent($response);
        
        return $this->response;
    }
    
    public function newAddressAction()
    {
        Tag::setTitle('Add new address');
        $this->assets->collection('additional')->addCss('css/signin.css');
        Parent::initialize();
        $this->view->user_id = $this->session->get('id');
    }
    
    public function addAddressAction() 
    {
        if($this->security->checkToken() == false) {
            $this->flash->error('Invalid CSRF token');
            $this->response->redirect("signin/register");
            return;
        }
        
        $this->view->disable();
        
        $userId = $this->request->getPost('user_id');
        $city = $this->request->getPost('city');
        $street = $this->request->getPost('street');
        $number = $this->request->getPost('number');
        $building = $this->request->getPost('building');
        $entrance = $this->request->getPost('entrance');
        $apartment = $this->request->getPost('apartment');
        
        if ($this->request->isPost() == true) {
            
            $address = new Addresses();
            
            if(!$address->save($_POST)) {
                $output = [];
                foreach($user->getMessages() as $message) {
                    $output[] = $message;
                }
                
                $output = implode(', ', $output);
                
                $this->flash->error($output);
                $this->response->redirect("addresses/newAddress");
                return;
            }

            $this->flash->success('Address was successfully added'); 
            $this->response->redirect("addresses/");
            return;
            
        }
    }
}