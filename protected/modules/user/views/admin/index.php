<?php
$this->breadcrumbs=array(
	'Preferencias'=>array('/site/preferencias'),
	UserModule::t('Manage'),
);


?>
<h1><?php echo UserModule::t("Manage Users"); ?></h1>

<?php 
 $this->widget('zii.widgets.CMenu', array(
                'items'=>array(array('label'=>'Agregar', 'url'=>array('create'))),
                'htmlOptions'=>array('class'=>'MenuOperations'),
            ));
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	 'afterAjaxUpdate'=>'function(id, data){afterAjaxUpdateSuccess();}',
	'columns'=>array(
		/*array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
		),*/
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(UHtml::markSearch($data,"username"),array("admin/view","id"=>$data->id))',
		),
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(UHtml::markSearch($data,"email"), "mailto:".$data->email)',
		),
		'create_at',
		'lastvisit_at',
		array(
			'name'=>'superuser',
			'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
			'filter'=>User::itemAlias("AdminStatus"),
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
			'filter' => User::itemAlias("UserStatus"),
		),
		array(
			'class'=>'CButtonColumn',
			 'template'=>'{update}{delete}',
			'header'=>'Acciones',
			'afterDelete'=>'function(link,success,data){if(success)mostrarMensajes(data); }',
			'buttons'=>array(
                         'update'=> array(
                                                                 
                                      'imageUrl'=>Yii::app()->request->baseUrl.'/images/edit.png',
                                   ),
                        'delete'=>  array('imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
                                      
                                    ),
                ),
		),
	),
)); ?>
