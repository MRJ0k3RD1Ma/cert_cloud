<?php

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Certificate $model */
/** @var yii\widgets\ActiveForm $form */
$this->title = 'Sertifikat kiritish';
$this->params['breadcrumbs'][] = $this->title;


$pin = $model->pin;
$qr = function() use ($pin) {
    $data=Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data(Yii::$app->urlManager->createAbsoluteUrl(['/site/view','id'=>$pin]))
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(200)
        ->margin(3)
        ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
//        ->logoPath(Yii::$app->basePath."/web/favicon.png")
        ->labelText('')
        ->labelFont(new NotoSans(20))
        ->labelAlignment(new LabelAlignmentCenter())
        ->build();
    return $data->getDataUri();
};
?>

<div class="certificate-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'pin')->textInput() ?>

            <?= $form->field($model, 'pdf')->fileInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col-md-6">
                    <div id="imgqr">
                        <img src="<?= $qr()?>" id="qrimg" alt="sert">
                    </div>
                   
            </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    $url = Yii::$app->urlManager->createUrl(['/admin/default/qr','down'=>0]);
    $this->registerJs("
        $('#certificate-pin').change(function(){
            $.get('{$url}&pin='+$('#certificate-pin').val()).done(function(data){
                $('#qrimg').attr('src',data);
            });
        });
        $('#download').click(function(){
            url = this.value;
            url = url + '&pin='+$('#certificate-pin').val();
            window.location.assign(url);
        })
    ")
?>