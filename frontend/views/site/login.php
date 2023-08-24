<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

    <section id="account-login" class="flexbox-container">
        <div class="col-12 d-flex align-items-center justify-content-center">

            <!-- login form -->
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-5 col-12 p-0">
                <div class="card border-grey border-lighten-3 m-0 box-shadow-0 card-account-right height-400">
                    <div class="card-content">
                        <div class="card-body p-3">
                            <p class="text-center h5 text-capitalize">Sertifikatlar tizimiga xush kelibsiz!</p>
                            <p class="mb-3 text-center">Login va parollaringizni kiriting</p>

                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

                            <button type="submit" class="btn-gradient-primary btn-block my-1">Kirish</button>


                            <?php ActiveForm::end(); ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<style>
    .mb-3{
        margin-bottom: 1rem !important;
    }
</style>