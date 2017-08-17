<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\modules\recept\models\Recept */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recept-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    <?php if($model->isNewRecord){ ?>
    <?php echo $form->field($model, 'idIngredients')->widget(Select2::classname(), [
        'data' => $ingrediets,
        'language' => 'en',
        'options' => ['multiple' => true,'placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <?php }else{ ?>
        <?= Select2::widget([
            'name'=>'Recept[idIngredients]',
            'value' => $value,
            'data' => $ingrediets,
            'options' => ['multiple' => true],
            'pluginOptions' => [
                'tags' => true,
            ],
        ]);?>
    <?php }?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
