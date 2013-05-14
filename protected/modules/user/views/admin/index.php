<?php
$this->breadcrumbs=array(	
    'Administración',
	'Administrar Usuarios',
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
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
			'filter' => User::itemAlias("UserStatus"),
		),
		array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'header'=>'Opciones',
            'template' => '{view}{update}{delete}',
            'afterDelete'=>'function(link,success,data){if(success)mostrarMensajes(data); }',
            'buttons' => array(
                'view' => array(                    
                    'options'=>array(
                        'class'=>'btn-small view'
                    )
                ),
                'update' => array(                    
                    'options'=>array(
                        'class'=>'btn-small update'
                    )
                ),
                'delete' => array(                    
                    'options'=>array(
                        'class'=>'btn-small delete'
                    )
                )
            ),
            'htmlOptions'=>array('style'=>'width: 80px'),
        ),
	),
)); ?>
