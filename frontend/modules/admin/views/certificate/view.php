<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Certificate $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sertifikatlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="certificate-view">

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <p>
                    <?= Html::a('O`zgartirish', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('O`chirish', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'pin',
//            'url',
                        [
                            'attribute'=>'url',
                            'value'=>function($d){

                                return "<a href='{$d->url}'>{$d->url}</a>";
                            },
                            'format'=>'raw'
                        ],
                        [
                            'attribute'=>'url',
                            'value'=>function($d){

                                return "<a href='{$d->url_qr}'>{$d->url_qr}</a>";
                            },
                            'format'=>'raw'
                        ],
//            'word',
                        [
                            'attribute'=>'word',
                            'value'=>function($d){
                                return "<a href='/upload/{$d->word}'>Word faylni yuklab olish</a>";
                            },
                            'format'=>'raw'
                        ],
                        [
                            'attribute'=>'pdf',
                            'value'=>function($d){
                                return "<a href='/upload/{$d->pdf}'>PDF faylni yuklab olish</a>";
                            },
                            'format'=>'raw'
                        ],
//            'pdf',
                        'created',
                        'updated',
                        'status',
                    ],
                ]) ?>
            </div>
        </div>
    </div>


</div>
