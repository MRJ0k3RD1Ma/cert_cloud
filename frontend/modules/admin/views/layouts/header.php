<!-- fixed-top-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-bg-color">
    <div class="navbar-wrapper">
        <div class="navbar-header d-md-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item d-md-none"><a class="navbar-brand"
                                                  href="<?= Yii::$app->urlManager->createUrl(['/admin']) ?>"><img
                                class="brand-logo d-none d-md-block" alt="CryptoDash admin logo"
                                src="/design/app-assets/images/logo/logo.png"><img
                                class="brand-logo d-sm-block d-md-none" alt="CryptoDash admin logo sm"
                                src="/design/app-assets/images/logo/logo-sm.png"></a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                                                  data-target="#navbar-mobile"><i class="la la-ellipsis-v"> </i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"> </i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i
                                    class="ficon ft-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Qidirish: Pinni kiriting...">
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <span class="avatar avatar-online"><img
                                        src="/design/app-assets/images/portrait/small/avatar-s-1.png"
                                        alt="avatar"></span><span class="mr-1"><span
                                        class="user-name text-bold-700"><?= Yii::$app->user->isGuest ? 'admin' : Yii::$app->user->identity->name ?></span></span></a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                          href="<?= Yii::$app->urlManager->createUrl(['/admin/user/update', 'id' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->id]) ?>"><i
                                        class="ft-award"></i>John Doe</a><a class="dropdown-item"
                                                                            href="<?= Yii::$app->urlManager->createUrl(['/site/logout']) ?>"
                                                                            data-method="post"><i class="ft-power"></i>
                                Chiqish</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
