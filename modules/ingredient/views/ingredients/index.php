<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \app\modules\recept\models\Recept;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\ingredient\models\IngredientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ingredients';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="ingredients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ingredients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
