<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="card">
        <div class="card-content">
            <div class="card-body">

            <div class="table-responsive">

                <p>
                    <?= Html::a('Foydalanuvchi qo`shish', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//                        'id',
//                        'name',
                        [
                            'attribute'=>'name',
                            'value'=>function($d){
                                $url = Yii::$app->urlManager->createUrl(['/admin/user/view','id'=>$d->id]);
                                return "<a href='{$url}'>{$d->name}</a>";
                            },
                            'format'=>'raw'
                        ],
                        'username',
                        [
                            'attribute'=>'password',
                            'value'=>function($d){
                                return "****";
                            },
                            'filter'=>false
                        ],
                    ],
                ]); ?>
            </div>

            </div>
        </div>
    </div>


</div>
