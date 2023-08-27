<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Certificate $model */
/** @var yii\widgets\ActiveForm $form */
$this->title = 'Sertifikat kiritish';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="certificate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pin')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['type'=>'url']) ?>

    <?= $form->field($model, 'word')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
