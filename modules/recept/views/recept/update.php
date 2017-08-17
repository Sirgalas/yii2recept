<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ingredient\models\Ingredients */

$this->title = 'Update Recept: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Recept', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ingredients-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ingrediets'=>$ingrediets,
        'value' =>$value
    ]) ?>

</div>
