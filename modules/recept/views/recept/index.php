<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\recept\models\ReceptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recepts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recept-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Recept', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'content',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
