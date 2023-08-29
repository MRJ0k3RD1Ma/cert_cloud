<?php

/** @var \yii\web\View $this */

/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="/favicon.png">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>


        <style>
            p {
                margin: 0;
            }

            .dogs-title {
                font-size: 120%;
                font-weight: bold;
                margin-bottom: 15px;
            }

            .dogs-title-border::after {
                margin-top: 10px;
                display: block;
                content: "";
                width: 70px;
                border-top: 3px solid #CC3304;
            }

            .add-pet-wrap {
                position: relative;
                height: 232px;
                text-align: center;
                border: 1px dashed #777;
                border-radius: 4px;
            }

            .add-pet-wrap .add-pet-content {
                position: relative;
                top: 50%;
                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
            }

            .col-center {
                float: none;
                margin-left: auto;
                margin-right: auto;
            }

            label {
                margin: 0;
            }

            .app-profile-menu {
                border-bottom: 1px solid #DDDDDD;
                padding: 10px;
            }

            #apporgans-address,
            #apponline-additional_information,
            #apponline-rejection_reason {
                resize: none;
            }

            .select2-container .select2-selection--single {
                height: 34px;
                border-radius: 17px;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 34px;
                padding-left: 20px;
                font-size: 14px;
            }

            .select2-results__option {
                font-size: 14px;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                top: 5px;
            }

            .field-apponline-production_type_one,
            .field-apponline-production_type_two,
            .app-nd-file {
                display: none;
            }

            .input-group-addon {
                border-radius: 0 17px 17px 0;
            }

            .sweet-alert .sa-button-container .confirm {
                color: #fff !important;
                background-color: #337ab7 !important;
                border-color: #2e6da4 !important;
            }

            .sweet-alert .sa-button-container .cancel {
                color: #fff !important;
                background-color: #c9302c !important;
                border-color: #ac2925 !important;
            }

            .table-bordered > tbody > tr > th {
                width: 50%;
            }
        </style>


    </head>
    <body>
    <?php $this->beginBody() ?>


    <div class="wrap">
        <nav id="w0" class="navbar-inverse navbar-fixed-top navbar">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span
                                class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-file"
                                                           style="color: rgb(0, 75, 150); font-size: 30px; vertical-align: middle;"></span>
                        certificate.standart.uz</a></div>
                <div id="w0-collapse" class="collapse navbar-collapse">
                    <ul id="w1" class="navbar-nav navbar-right nav">
                        <li><a href="https://standart.uz">
                                <div>Агентство «УЗСТАНДАРТ»</div>
                            </a></li>
                        <li><a href="/site/letter-search">
                                <div>Письмо</div>
                            </a></li>
                        <li><a href="/site/decision-search">
                                <div>Решение</div>
                            </a></li>
                        <li><a href="/site/decision-cement-search">
                                <div>Решение(Цемент)</div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <?= $content?>
        </div>
    </div>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
