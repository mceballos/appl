<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/FusionCharts.debug.js');
?>
</div><!-- Cerrando content -->

    <div class="graficos-inicio left">
        <h3> Desarrollado con el potencial de:</h3>
        
       <center><img border="0"  src="<?php echo Yii::app()->request->baseUrl;?>/images/lenguajes.jpg" /></center>
        
    </div><!-- graficos-inicio -->
    
    <div class="sidebar right">
        <div class="login-inicio"> 
            <h1> ACCESO FUNCIONARIOS</h1>
            Para acceder al sistema por favor ingrese su nombre de usuario y contraseña <br />
            <?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
                <?php echo Yii::app()->user->getFlash('loginMessage'); ?>
            <?php endif; ?>
            <div class="form2">
            <?php echo CHtml::beginForm(); ?>    
                <table class="login">
                    <tr><td><?php echo CHtml::activeLabelEx($model,'username'); ?></td><td><?php echo CHtml::activeTextField($model,'username') ?></td></tr>
                    <tr><td><?php echo CHtml::activeLabelEx($model,'password'); ?></td><td><?php echo CHtml::activePasswordField($model,'password') ?></td></tr>
                    <tr><td></td><td><?php echo CHtml::submitButton(UserModule::t("ACCEDER"),array('class'=>'boton')); ?></td></tr>
                </table>
            <?php echo CHtml::endForm(); ?>
            </div><!-- form -->
            
       </div> <!-- End login-inicio -->
    <p>El acceso a este sistema está restringido únicamente a los funcionarios del establecimiento Educacional.</p>
    </div><!-- End Sidebar -->
    <br class="clear" />
    
    <div id="zona-banner">
        <br class="clear" />
   
    
<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        )
    ),
    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>