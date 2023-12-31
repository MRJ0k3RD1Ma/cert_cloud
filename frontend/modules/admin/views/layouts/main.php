<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\BackAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

BackAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-compact-menu" data-col="2-columns">
<?php $this->beginBody() ?>

<?= $this->render('header')?>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<?= $this->render('menu')?>



<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <div class="content-body"><!-- ICO Token &  Distribution-->

        <?= $content?>

        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
