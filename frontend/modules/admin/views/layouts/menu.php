
<div class="main-menu menu-fixed menu-dark menu-bg-default rounded menu-accordion menu-shadow">
    <div class="main-menu-content"><a class="navigation-brand d-none d-md-block d-lg-block d-xl-block" href="<?= Yii::$app->urlManager->createUrl(['/admin'])?>"><img class="brand-logo" alt="CryptoDash admin logo" src="/design/app-assets/images/logo/logo.png"/></a>
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="active"><a href="<?= Yii::$app->urlManager->createUrl(['/admin'])?>"><i class="icon-grid"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>
            <li class=" nav-item"><a href="<?= Yii::$app->urlManager->createUrl(['/admin/certificate'])?>"><i class="icon-layers"></i><span class="menu-title" data-i18n="">Sertifikatlar</span></a>
            </li>
            <li class=" nav-item"><a href="<?= Yii::$app->urlManager->createUrl(['/admin/user'])?>"><i class="icon-user-following"></i><span class="menu-title" data-i18n="">Foydalanuvchilar</span></a>
            </li>
        </ul>
    </div>
</div>
