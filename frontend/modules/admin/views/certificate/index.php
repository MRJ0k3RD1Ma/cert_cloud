<?php

use common\models\Certificate;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\CertificateSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Sertifikatlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificate-index">

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <p>
                    <?= Html::a('Sertifikat qo`shish', ['/admin'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//                        'id',
                        'pin',
                        'word',
                        'pdf',
                        'created',
                        'updated',
//                        'status',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Certificate $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>

</div>
