<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'murad-banner-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="note">Dòng có dấu <span class="required">*</span> là bắt buộc.</p>
    <?php echo MyFormat::BindNotifyMsg(); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>350)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'gender'); ?>
        <?php echo $form->textField($model,'gender',array('size'=>60,'maxlength'=>350)); ?>
        <?php echo $form->error($model,'gender'); ?>
    </div>
    
    
    <div class="row">
            <?php echo $form->labelEx($model,'dob'); ?>
            <?php 
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model,        
                    'attribute'=>'dob',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=> ActiveRecord::getDateFormatJquery(),
//                            'minDate'=> '0',
//                            'maxDate'=> '0',
                        'changeMonth' => true,
                        'changeYear' => true,
                        'showOn' => 'button',
                        'buttonImage'=> Yii::app()->theme->baseUrl.'/admin/images/icon_calendar_r.gif',
                        'buttonImageOnly'=> true,                                
                    ),        
                    'htmlOptions'=>array(
                        'class'=>'w-16',
                        'style'=>'height:20px;',
                            'readonly'=>'readonly',
                    ),
                ));
            ?>  
            <?php echo $form->error($model,'dob'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'phone'); ?>
        <?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>350)); ?>
        <?php echo $form->error($model,'phone'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'address'); ?>
        <?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'address'); ?>
    </div>
    
    
     <div class="row buttons" style="padding-left: 141px;">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'label'=>$model->isNewRecord ? 'Create' :'Save',
            'type'=>'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size'=>'small', // null, 'large', 'small' or 'mini'
            //'htmlOptions' => array('style' => 'margin-bottom: 10px; float: right;'),
        )); ?>
    </div>
    

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    $(document).ready(function(){
        $('.form').find('button:submit').click(function(){
            $.blockUI({ overlayCSS: { backgroundColor: '#fff' } }); 
        });
        jQuery('a.gallery').colorbox({ opacity:0.5 , rel:'group1',innerHeight:'1000', innerWidth: '1050' });
    });
</script>
