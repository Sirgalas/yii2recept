<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\recept\models\Recept */

$this->title = 'Create Recept';
$this->params['breadcrumbs'][] = ['label' => 'Recepts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recept-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ingrediets'=>$ingrediets
    ]) ?>

</div>
