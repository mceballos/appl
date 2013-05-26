<?php 
$userID = Yii::app()->user->id;
?>
<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'encargados-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	
	<table width="100%" border="0" cellspacing="5" cellpadding="5">
        <tr>
            <td align="left" style="width: 130px;"><?php echo $form->labelEx($model,'parentesco_id'); ?></td>
            <td style="width: 380px;"><?php echo $form->dropDownList($model, 'parentesco_id', GxHtml::listDataEx(Parentescos::model()->findAll(array('condition'=>'estado=1')))); ?>
                <?php echo $form->error($model,'parentesco_id'); ?>
            </td>
                
            <td align="left" style="width: 116px;"><?php echo $form->labelEx($model,'rut'); ?></td>
            <td><?php echo $form->textField($model, 'rut',array('maxlength' => 8,'size'=>11)).'-'.$form->textField($model, 'dv', array('maxlength' => 1,'size'=>2)) ?>
        		<?php echo $form->error($model,'rut'); ?>
       		 	<?php echo $form->error($model,'dv'); ?>
        	</td>    
        </tr>
        <tr>
            <td align="left"><?php echo $form->labelEx($model,'nombre'); ?></td>
            <td><?php echo $form->textField($model, 'nombre', array('maxlength' => 50,'size'=>40)); ?>
                <?php echo $form->error($model,'nombre'); ?></td>
            <td align="left"><?php echo $form->labelEx($model,'apellido_paterno'); ?></td>
            <td><?php echo $form->textField($model, 'apellido_paterno', array('maxlength' => 50,'size'=>40,'style'=>'width: 145px;')); ?>
                <?php echo $form->error($model,'apellido_paterno'); ?></td>    
        </tr>
        <tr>
            <td align="left"><?php echo $form->labelEx($model,'apellido_materno'); ?></td>
            <td><?php echo $form->textField($model, 'apellido_materno', array('maxlength' => 50,'size'=>40)); ?>
                <?php echo $form->error($model,'apellido_materno'); ?></td>
            <td align="left"><?php echo $form->labelEx($model,'telefono_laboral'); ?></td>
            <td><?php echo $form->textField($model, 'telefono_laboral', array('maxlength' => 12,'style'=>'width: 145px;')); ?>
                <?php echo $form->error($model,'telefono_laboral'); ?></td>    
        </tr>
        <tr>
            <td align="left"><?php echo $form->labelEx($model,'telefono_fijo'); ?></td>
            <td><?php echo $form->textField($model, 'telefono_fijo', array('maxlength' => 12, 'onkeydown'=>'validarNumeros(event)')); ?>
                <?php echo $form->error($model,'telefono_fijo'); ?></td>
            <td align="left"><?php echo $form->labelEx($model,'celular'); ?></td>
            <td><?php echo $form->textField($model, 'celular', array('maxlength' => 12,'onkeydown'=>'validarNumeros(event)','style'=>'width: 145px;')); ?>
                <?php echo $form->error($model,'celular'); ?></td>    
        </tr>
        <tr>
            <td align="left"><?php echo $form->labelEx($model,'direccion_particular'); ?></td>
            <td colspan="3"><?php echo $form->textField($model, 'direccion_particular', array('maxlength' => 200,'size'=>80)); ?>
                <?php echo $form->error($model,'direccion_particular'); ?></td>
       </tr>
       <tr>
            <td align="left"><?php echo $form->labelEx($model,'villa_poblacion'); ?></td>
            <td colspan="3"><?php echo $form->textField($model, 'villa_poblacion', array('maxlength' => 200,'size'=>80)); ?>
                <?php echo $form->error($model,'villa_poblacion'); ?></td>    
        </tr>
        <tr>
            <td align="left">       <?php echo $form->labelEx($model,'comuna_id'); ?></td>
            <td><?php echo $form->dropDownList($model, 'comuna_id', GxHtml::listDataEx(Comuna::model()->findAll(array('order'=>'nombre'),array('condition'=>'estado=1')))); ?>
                <?php echo $form->error($model,'comuna_id'); ?></td>
            <td align="left"><?php echo $form->labelEx($model,'estudios_superiores_anios'); ?></td>
            <td><?php echo $form->textField($model, 'estudios_superiores_anios', array('maxlength' => 2,'size'=>5,'onkeydown'=>'validarNumeros(event)')); ?>
                <?php echo $form->error($model,'estudios_superiores_anios'); ?></td>    
        </tr>
        <tr>
            <td align="left"><?php echo $form->labelEx($model,'ocupacion'); ?></td>
            <td><?php echo $form->textField($model, 'ocupacion', array('maxlength' => 50,'size'=>40)); ?>
                <?php echo $form->error($model,'ocupacion'); ?></td>
            <td align="left"></td>
            <td></td>    
        </tr>
    </table>
		
		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
<div class="limpia"></div>
</div><!-- form -->
<div class="limpia"></div>
</div>