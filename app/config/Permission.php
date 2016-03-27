<?php

/* 
 * @author vvaduva
 * @created on Mar 15, 2016
 * @created at 2:26:54 PM
 */
use \Phalcon\Mvc\User\Plugin;
use \Phalcon\Mvc\Dispatcher;
use \Phalcon\Events\Event;
use \Phalcon\Acl;

class Permission extends Plugin
{
    /**
     * Constants to prevent a typo
     */
    const GUEST = 'guest';
    const USER = 'user';
    const ADMIN = 'admin';
    
    protected $_publicResources = [
        'index' => ['*'],
        'signin' => ['*']
    ];
    protected $_userResources = [
        'dashboard' => ['*'],
        'addresses' => ['*']
    ];
    protected $_adminResources = [
        'admin' => ['*']
    ];
    
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        // Get the current role
        $role = $this->session->get('role');
        
        if (!$role) { 
            $role = self::GUEST;
        }
        
        // Get the current controller and action from the dispatcher
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        
        // Get the ACL rule list
        $acl = $this->_getAcl();

        // See if they have permission
        $allowed = $acl->isAllowed($role, $controller, $action);

        if ($allowed != Acl::ALLOW) {
            $this->flash->error('Not allowed there.');
            $this->response->redirect('index');

            // Stop the dispatcher at the current operation
            return false;
        }
    }
    
    protected function _getAcl()
    {
        if(!isset($this->persistent->acl)) {
            
            $acl = new Acl\Adapter\Memory();
            $acl->setDefaultAction(Acl::DENY);
            
            $roles = [
                self::GUEST => new Acl\Role(self::GUEST),
                self::USER => new Acl\Role(self::USER),
                self::ADMIN => new Acl\Role(self::ADMIN)
            ];
            
            foreach ($roles AS $role) {
                $acl->addRole($role);
            }
            
            // Public resources
            foreach ($this->_publicResources AS $resource => $action) {
                $acl->addResource(new Acl\Resource($resource), '*');
            }
            
            // User resources
            foreach ($this->_userResources AS $resource => $action) {
                $acl->addResource(new Acl\Resource($resource), $action);
            }
            
            // Admin resources
            foreach ($this->_adminResources AS $resource => $action) {
                $acl->addResource(new Acl\Resource($resource), $action);
            }
            
            // Allow all roles to access the public resources
            foreach ($roles AS $role) {
                foreach ($this->_publicResources AS $resource => $actions) {
                    $acl->allow($role->getName(), $resource, '*');
                }
            }
            
            // Allow user and admin to access the user resource
            foreach ($this->_userResources AS $resource => $actions) {
                foreach ($actions AS $action) {
                    $acl->allow(self::USER, $resource, $action);
                    $acl->allow(self::ADMIN, $resource, $action);
                }
            }
            
            // Allow admin to access the admin resources
            foreach ($this->_adminResources AS $resource => $actions) {
                foreach ($actions AS $action) {
                    $acl->allow(self::ADMIN, $resource, $action);
                }
            }
            
            $this->persistent->acl = $acl;
        }
        
        return $this->persistent->acl;
    }
}