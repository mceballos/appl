<?php

$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Manage'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('grados-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>
<div class="form">
<h3><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h3>


<?php echo GxHtml::link(Yii::t('app', 'Búsqueda Avanzada'), '#', array('class' => 'search-button')); ?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
    'model' => $model,
)); ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.CMenu', array(
                    'items'=>array(array('label'=>'Agregar', 'url'=>array('create'))),
                    'htmlOptions'=>array('class'=>'MenuOperations'),
                ));

?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'grados-grid',
    'dataProvider' => $model->search(),
    'afterAjaxUpdate'=>'function(id, data){afterAjaxUpdateSuccess();}',
    //'filter' => $model,
    'columns' => array(
        array(
            'header'=>'N°',
            'htmlOptions'=>array('width'=>'30'),
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        'nombre',
        //'estado',
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
        /*array(
            'class' => 'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'header' => 'Acción',
            'buttons'=>array(                  

                'view'=>
                        array(    
                            'url'=>'$this->grid->controller->createUrl("ver", array("id"=>$data->id))',                              
                        ),          
            ),   
        ),*/
    ),
)); ?>
</div>