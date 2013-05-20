<div class="content">
<div class="form">
<h3> <?php echo $titulo; ?></h3>
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'comuna-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
       <table width="100%" border="0" cellspacing="5" cellpadding="5">
        <tr>
            <td align="right" style="width: 150px;"><?php echo $form->labelEx($model,'nombre'); ?></td>
            <td><?php echo $form->textField($model, 'nombre', array('maxlength' => 200)); ?>
        <?php echo $form->error($model,'nombre'); ?></td>
        </tr>
        <tr>
            <td align="right" style="width: 150px;"><?php echo $form->labelEx($model,'comuna_provincia_id'); ?></td>
            <td><?php echo $form->dropDownList($model, 'comuna_provincia_id', GxHtml::listDataEx(Comuna::model()->findAllAttributes(null, true))); ?>
        <?php echo $form->error($model,'comuna_provincia_id'); ?></td>
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