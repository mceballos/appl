<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>
    <?php 
        if(isset($titulo)) echo "<h3>".$titulo."</h3>";
    ?>
	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php 
	   //RCP echo $form->errorSummary(array($model,$profile));
	   echo $form->errorSummary(array($model)); 
	?>
    <table border="0" cellspacing="5" cellpadding="5">
        <tr>
            <td align="right" width="150px"><?php echo $form->labelEx($model,'username'); ?></td>
            <td><?php echo $form->textField($model,'username',array('style'=>'width: 250px;','maxlength'=>20)); ?>
                <?php echo $form->error($model,'username'); ?>
            </td>
            <td align="right" width="150px"><?php echo $form->labelEx($model,'password'); ?></td>
            <td><?php echo $form->passwordField($model,'password',array('maxlength'=>128,'style'=>'width: 250px;')); ?>
                <?php echo $form->error($model,'password'); ?></td>            
        </tr>

        <tr>
            <td align="right" width="150px"><?php echo $form->labelEx($model,'email'); ?></td>
         <td><?php echo $form->textField($model,'email',array('style'=>'width: 250px;','maxlength'=>20)); ?>
                <?php echo $form->error($model,'email'); ?>
          </td>
            
            <td align="right"> <?php echo $form->labelEx($model,'status'); ?></td>
            <td >   <?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus'),array('style'=>'width: 266px;')); ?>
            <?php echo $form->error($model,'status'); ?>
            </td>
        </tr>
        
         
        
        <tr>
            <td align="right"><?php echo $form->labelEx($model,'nombres'); ?></td>
            <td><?php echo $form->textField($model,'nombres',array('style'=>'width: 252px;','maxlength'=>128)); ?>
        <?php echo $form->error($model,'nombres'); ?></td>
        <td align="right"><?php echo $form->labelEx($model,'ape_paterno'); ?></td>
            <td><?php echo $form->textField($model,'ape_paterno',array('style'=>'width: 254px;','maxlength'=>128)); ?>
        <?php echo $form->error($model,'ape_paterno'); ?></td>
            
        </tr>
    
        <tr>            
            <td align="right"><?php echo $form->labelEx($model,'ape_materno'); ?></td>
            <td><?php echo $form->textField($model,'ape_materno',array('style'=>'width: 250px;','maxlength'=>128)); ?>
        <?php echo $form->error($model,'ape_materno'); ?></td>
            <td align="right"><?php echo $form->labelEx($model,'rut'); ?></td>
            <td><?php echo $form->textField($model,'rut',array('style'=>'width: 250px;','maxlength'=>128)); ?>
            <?php echo $form->error($model,'rut'); ?></td>
        </tr>        
    </table>   
    
 </div><!-- form -->   

	<div class="box rowright47">
              <h3><?php echo $form->labelEx($model,'authItems'); ?></h3>
              <?php echo $form->error($model,'authItems'); ?>
              <div class="grid-view overflow"> 
            <table class="items">
            <thead>
              <tr><th width="70%">Perfiles</th><th>Acción</th></tr>
            </thead>
        <tbody>  
              
              <?php 
              $arrayPerfiles = CHtml::listData(AuthItem::model()->findAll(), 'name', 'name');
              $arraySelectedPerfiles=CHtml::listData($model->authItems,'name','name');
              $x=0;   
                         
              foreach($arrayPerfiles as $k=>$v):
                  $parOImpar=$x%2?"even":"odd";
                  echo "<tr class=".$parOImpar.">";
                  echo "<td><label for=\"User_authItems_".$x."\">".ucfirst($v)."</label></td>";
                  if (array_key_exists($k, $arraySelectedPerfiles)) {
                     echo "<td><input type=\"radio\" name=\"User[authItems][]\" checked=\"checked\" value=\"".$k."\" id=\"User_authItems_".$x."\"></td>";     
                  }else{
                      echo "<td><input type=\"radio\" name=\"User[authItems][]\" value=\"".$k."\" id=\"User_authItems_".$x."\"></td>";
                  }
                  echo "</tr>";
              ?>    
              
              <?php $x++; endforeach; ?>     
     </tbody>
     
            </table>
        </div>
    </div>
    
    <div class="limpia"></div>
    
<?php 
		/*$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			
	       echo '<div class="row">';
		 echo $form->labelEx($profile,$field->varname); 
         
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); 
	       echo "</div>";
			
			}
		}*/
?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
	</div>

<?php $this->endWidget(); ?>

