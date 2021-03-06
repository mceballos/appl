 <?php
class ReportesController extends GxController
{
	/**
	 * Declares class-based actions.
	 */
	

public function filters() {
    return array(
            'accessControl', 
            );
}

public function accessRules() {
    return array(
            array('allow', 
                'actions'=>array('index','alumnosCurso'),
                'roles'=>array('administrativo'),
                ),          
            array('deny', 
                'users'=>array('*'),
                ),
            );
}



	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		
		$this->render('index');
	}
	
	public function actionAlumnosCurso()
	{
		$model = new ProcesosPeriodos('searchCursos');
		$model->unsetAttributes();
		
		if (isset($_GET['ProcesosPeriodos']))
			//$model->setAttributes($_GET['ProcesosPeriodos']);
			$model->attributes = $_GET['ProcesosPeriodos'];
			
		
		$this->render('alumnosCurso', array(
			'model' => $model,
		));
	}	
    

}

