<?php

class WebUser extends CWebUser
{

    public function getRole()
    {
        return $this->getState('__role');
    }
    
    public function getId()
    {
        return $this->getState('__id') ? $this->getState('__id') : 0;
    }

//    protected function beforeLogin($id, $states, $fromCookie)
//    {
//        parent::beforeLogin($id, $states, $fromCookie);
//
//        $model = new UserLoginStats();
//        $model->attributes = array(
//            'user_id' => $id,
//            'ip' => ip2long(Yii::app()->request->getUserHostAddress())
//        );
//        $model->save();
//
//        return true;
//    }

    protected function afterLogin($fromCookie)
	{
        parent::afterLogin($fromCookie);
        $this->updateSession();
	}

    public function updateSession() {
        $user = Yii::app()->getModule('user')->user($this->id);
         $userAttributes = array(
                                                'email'=>$user->email,
                                                'username'=>$user->username,
                                                'create_at'=>$user->create_at,
                                                'lastvisit_at'=>$user->lastvisit_at,
                                           );                                
        foreach ($userAttributes as $attrName=>$attrValue) {
            $this->setState($attrName,$attrValue);
        }
    }

    public function model($id=0) {
        return Yii::app()->getModule('user')->user($id);
    }

    public function user($id=0) {
        return $this->model($id);
    }

    public function getUserByName($username) {
        return Yii::app()->getModule('user')->getUserByName($username);
    }

    public function getAdmins() {
        return Yii::app()->getModule('user')->getAdmins();
    }

    public function isAdmin() {
        return Yii::app()->getModule('user')->isAdmin();
    }
    
    
    
    //$controllerName="Nombre de controlador a consultar"
    //$action="Nombre de la accion a validar el acceso para el usuario actual"
    public function checkAccessChangeData($actionName='update') {
        $executeAction=false;
        $controllerName=Yii::app()->controller->id."Controller";
        $controller = new $controllerName('accessRules');        
                     
        foreach($controller->accessRules() as $key=>$v){
            //Si la funcion permite el acceso debemos validar si el usuario actual está dentro de los permisos para ingresar/editar/eliminar        
            if (array_key_exists('actions', $v) && array_key_exists('roles', $v)){
                if (in_array($actionName, $v['actions'])){
                     //Debemos verificar si nosotros tenemos acceso a los roles
                     foreach($v['roles'] as $rol){
                         if(Yii::app()->user->checkAccess($rol)){
                             $executeAction=true;
                         }
                     }
                }
            }
        }
        return $executeAction;
    }
    
    
}