<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use kartik\select2\Select2;
use \yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\recept\models\ReceptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recepts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="recept-index col-md-12">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->field($model, 'ingredients')->widget(Select2::classname(), [
                'language' => 'en',
                'data' => $ingredients,
                'options' => ['multiple' => true, 'placeholder' => 'Select ingredients'],
            ]); ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

        <?= ListView::widget([
            'dataProvider'  => $dataProvider,
            'itemView'      => '_dish',
            'summary' => 'Показано {count} из {totalCount}',
            'pager' => [
                'firstPageLabel' => 'Первая',
                'lastPageLabel' => 'Последняя',
                'prevPageLabel' => '<span class="fa fa-angle-left"></span>',
                'nextPageLabel' => '<span class="fa fa-angle-right"></span>',
            ],
        ]) ?>
    </div>
    
</div>

