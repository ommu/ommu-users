<?php
/**
 * User Levels (user-level)
 * @var $this LevelController
 * @var $model UserLevel
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2012 Ommu Platform (opensource.ommu.co)
 * @link https://github.com/ommu/ommu-users
 * @contact (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'User Levels'=>array('manage'),
		'Create',
	);
?>


<?php $form=$this->beginWidget('application.libraries.core.components.system.OActiveForm', array(
	'id'=>'user-level-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>
<div class="dialog-content">

	<fieldset>

		<div class="clearfix">
			<label><?php echo $model->getAttributeLabel('name_i');?> <span class="required">*</span></label>
			<div class="desc">
				<?php echo $form->textField($model,'name_i',array('maxlength'=>32, 'class'=>'span-7')); ?>
				<?php echo $form->error($model,'name_i'); ?>
			</div>
		</div>

		<div class="clearfix">
			<label><?php echo $model->getAttributeLabel('desc_i');?> <span class="required">*</span></label>
			<div class="desc">
				<?php echo $form->textArea($model,'desc_i',array('rows'=>6, 'cols'=>50, 'class'=>'span-9 smaller')); ?>
				<?php echo $form->error($model,'desc_i'); ?>
			</div>
		</div>

		<div class="clearfix publish">
			<label><?php echo $model->getAttributeLabel('default');?> <span class="required">*</span></label>
			<div class="desc">
				<?php echo $form->checkBox($model,'default'); ?>
				<?php echo $form->labelEx($model,'default'); ?>
				<?php echo $form->error($model,'default'); ?>
			</div>
		</div>

	</fieldset>
</div>
<div class="dialog-submit">
	<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save') ,array('onclick' => 'setEnableSave()')); ?>
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>

<?php $this->endWidget(); ?>
