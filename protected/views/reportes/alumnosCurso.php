<?php

$this->breadcrumbs = array(
	//$model->label(2) => array('index'),
	Yii::t('app', 'Alumnos Por Curso'),
);




?>
<div class="form">
<h3>Alumnos Por Curso</h3>



<?php 

/*
 * 
  'filter'=>CHtml::listData(Risk::model()->findAll(
                  array(
                   'select'=>array('name'),
                   'distinct'=>true
                    
                  )),"name","name")//this is the focus of your code
 * 
 * */
	$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'alumnos-curso-grid',
	'dataProvider' => $model->searchCursos(),
	'filter' => $model,
	'columns' => array(
		array(
      		'header'=>'Nº',
      		'type'=>'raw',
      		'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',//this for the auto page number of cgridview
      		//'filter'=>''//without filtering
   		),
		//'seccion_grado_id',
		array(
			'name'=>'nombreCurso',
			'type'=>'raw',
			'value'=>'$data->nombreCurso',
			//'filter'=>'aa'
		),
		array(
			'header'=>'RUT ALUMNO',
			'type'=>'raw',
			'value'=>'$data->alumno_rut',
			//'filter'=>''//without filtering
		),
		array(
			'header'=>'NOMBRE COMPLETO',
			'type'=>'raw',
			'value'=>'$data->nombreCompleto',
			//'filter'=>''//without filtering
		),
	),
)); ?>
</div>