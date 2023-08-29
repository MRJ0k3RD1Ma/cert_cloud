<?php

/** @var yii\web\View $this */

$this->title = 'Главная | certificate.standart.uz';
?>
    <style type="text/css">
        p {
            margin: 0;
        }
    </style>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2"
             style="background-color: #FFFFFF; padding: 20px 15px; margin-bottom: 20px; min-height: 300px;">
            <div class="site-index">
                <div style="padding: 0; margin: 0; text-align: center;">
                    <h1 style="margin: 0; font-size: 220%; margin-bottom:">Добро пожаловать!</h1>
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4">
                            <img src="/frt/view.png" style="max-width: 100%;">
                            <p class="lead">Пожалуйста, введите</p>
                            <?php $form = \yii\widgets\ActiveForm::begin() ?>

                            <?= $form->field($model, 'pin')->textInput(['autofocus' => true])->label('Пин код') ?>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"
                                        name="signup-button">Поиск
                                </button>
                            </div>

                            <?php \yii\widgets\ActiveForm::end() ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


<?php
if (Yii::$app->session->hasFlash('error')) {
    $this->registerJs("
        Swal.fire({
          icon: 'error',
          title: 'Сертификат не найден!!!'
        })
        ");
}
?>