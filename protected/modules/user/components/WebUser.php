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
        //Rceballos:: El controller de profile del usuario no se está ocupoando, no es necesario realizar un merge de un array.
        /*$userAttributes = CMap::mergeArray(array(
                                                'email'=>$user->email,
                                                'username'=>$user->username,
                                                'create_at'=>$user->create_at,
                                                'lastvisit_at'=>$user->lastvisit_at,
                                           ),$user->profile->getAttributes());*/
        
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
    public function checkAccessChangeDataGore($controllerName='',$validateRow=array(),$actionName='update') {
        $executeAction=false;
        if($controllerName=='') return $executeAction;
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
        //En caso de no tener asignado su rol para editar, debemos buscar si la asignación está a nivel de responsable.
        if(count($validateRow)>0 && !$executeAction){
            //Procederemos a validar el acceso a un responsable            
            $modelName=$validateRow['modelName'];
            $fieldName=$validateRow['fieldName'];
            $idRow=$validateRow['idRow'];            
            $owner_id=null;
            $model = $modelName::model()->findAll(array('condition'=>'t.estado=1 AND t.id='.$idRow));
            if(isset($model[0]->$fieldName)){
                $owner_id=$model[0]->$fieldName;
            }
            //Verificando si el usuario tiene permisos para acceder o si es admin     
            $executeAction=(Yii::app()->user->id === $owner_id);
        }
        
        return $executeAction;
    }
    
    public function checkAccessChange($validateRow=array()) {
        $executeAction=false;
        //En caso de no tener asignado su rol para editar, debemos buscar si la asignación está a nivel de responsable.
        if(Yii::app()->user->checkAccess("admin")){
               $executeAction=true;
       }else{
           if(count($validateRow)>0){
                //Procederemos a validar el acceso a un responsable            
                $modelName=$validateRow['modelName'];
                $fieldName=$validateRow['fieldName'];
                $idRow=$validateRow['idRow'];            
                $owner_id=null;
                $model = $modelName::model()->findAll(array('condition'=>'t.estado=1 AND t.id='.$idRow));
                if(isset($model[0]->$fieldName)){
                    $owner_id=$model[0]->$fieldName;
                }
                //Verificando si el usuario tiene permisos para acceder o si es admin     
                $executeAction=(Yii::app()->user->id === $owner_id);
             }       
       }         
        return $executeAction;
    }
}