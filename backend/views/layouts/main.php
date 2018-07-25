<?php

/**
 * @var $content string
 */

use yii\helpers\Html;
use yii\helpers\Url;
use backend\components\CommentCountWidget;
use backend\components\CallbackCountWidget;

yiister\adminlte\assets\Asset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
    <style>
        .placeCount{
            margin-right: 30px;
        }
        .crop .workarea-cropbox, .crop .bg-cropbox {
            height: 500px;
            min-height: 500px;
            width: 650px;
            min-width: 650px;
        }
        @media(min-width:767px){
            .userIco{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
            }
        }
    </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><i class="fa fa-skyatlas" aria-hidden="true"></i></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><i class="fa fa-skyatlas" aria-hidden="true"></i> Облака</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- CallBack Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <?
                            $countCallback = CallbackCountWidget::widget();
                            $toDayCallback = CallbackCountWidget::widget(['toDay' => true]);
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-phone"></i>
                            <? if (!$countCallback == 0){?>
                                <span class="label label-success"><?=$countCallback?></span>
                            <?}?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Не обработанных запросов: <?=$countCallback?></li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <?=
                                        Html::a
                                        (
                                                "<i class='fa fa-users text-aqua'></i> $toDayCallback запросов сегодня",
                                                Url::to(['callback/index','CallbackSearch' =>['status'=>0, 'toDay'=>true]])
                                        )
                                        ?>
                                    </li><!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer">
                                <?=
                                Html::a
                                (
                                    "Показать все",
                                    Url::to(['callback/index','CallbackSearch' =>['status'=>0]])
                                )
                                ?>
                            </li>
                        </ul>
                    </li>
                    <!-- Comment Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <?
                            $countComment = CommentCountWidget::widget();
                            $toDayComment = CommentCountWidget::widget(['toDay' => true]);
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-comments-o"></i>
                            <? if (!$countComment == 0){?>
                                <span class="label label-warning"><?=$countComment?></span>
                            <?}?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">У вас <?=$countComment?> новых отзывов</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <?=
                                        Html::a
                                        (
                                                "<i class='fa fa-users text-aqua'></i> $toDayComment отзывов сегодня",
                                                Url::to(['comment/index','CommentSearche' =>['view'=>0, 'toDay'=>true]])
                                        )
                                        ?>
                                    </li><!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer">
                                <?=
                                Html::a
                                (
                                    "Показать все",
                                    Url::to(['comment/index','CommentSearche' =>['view'=>0]])
                                )
                                ?>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <span class="user-image"><i class="fa fa-user userIco" aria-hidden="true"></i></span>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-primary btn-flat">Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <?= Html::a('Выход', ['site/logout'], ['data'=>['method'=>'post'] ,'class'=>'btn btn-danger btn-flat']) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="/admin/params"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">



            <!-- Sidebar Menu -->

            <? if ($countComment == 0){
                $countComment = null;
            } ?>
            <? if ($countCallback == 0){
                $countCallback = null;
            } ?>
            <?=
            \yiister\adminlte\widgets\Menu::widget(
                [
                    "items" => [
                        ["label" => "Главная", "url" => "/admin", "icon" => "home"],
                        [
                            "label" => "Обратная связь",
                            "url" => ["/callback"],
                            "icon" => "phone",
                            "badge" => $countCallback,
                            "badgeOptions" => [
                                "class" => \yiister\adminlte\components\AdminLTE::BG_GREEN,
                            ],
                        ],
                        [
                            "label" => "Отзывы",
                            "url" => ["/comment"],
                            "icon" => "comments-o",
                            "badge" => $countComment,
                            "badgeOptions" => [
                                "class" => \yiister\adminlte\components\AdminLTE::BG_YELLOW,
                            ],

                        ],
                        [
                            "label" => "Места",
                            "icon" => "th",
                            "url" => "#",
                            "items" => [
                                ["label" => "Места", "url" => ["/places"]],
                                ["label" => "Продажи", "url" => ["site/flash-alert"]],
                            ],
                        ],
                        [
                            "label" => "Badges",
                            "url" => "#",
                            "icon" => "table",
                            "items" => [
                                [
                                    "label" => "Default",
                                    "url" => "#",
                                    "icon" => "table",
                                    "badge" => "123",
                                ],
                                [
                                    "label" => "Blue",
                                    "url" => "#",
                                    "icon" => "table",
                                    "badge" => "123",
                                    "badgeOptions" => [
                                        "class" => \yiister\adminlte\components\AdminLTE::BG_YELLOW,
                                    ],
                                ],
                            ],
                        ],
                        [
                            "label" => "Multilevel",
                            "url" => "#",
                            "icon" => "table",
                            "items" => [
                                [
                                    "label" => "Second level",
                                    "url" => "#",
                                ],
                                [
                                    "label" => "Second level",
                                    "url" => "#",
                                    "icon" => "table",
                                    "items" => [
                                        [
                                            "label" => "Default",
                                            "url" => "#",
                                        ],
                                        [
                                            "label" => "Red",
                                            "url" => "#",
                                            "icon" => "table",
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
            )
            ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= Html::encode(isset($this->params['h1']) ? $this->params['h1'] : $this->title) ?>
            </h1>
            <?php if (isset($this->params['breadcrumbs'])): ?>
                <?=
                \yii\widgets\Breadcrumbs::widget(
                    [
                        'encodeLabels' => false,
                        'homeLink' => [
                            'label' => new \rmrevin\yii\fontawesome\component\Icon('home') . ' Home',
                            'url' => '/',
                        ],
                        'links' => $this->params['breadcrumbs'],
                    ]
                )
                ?>
            <?php endif; ?>
        </section>

        <!-- Main content -->
        <section class="content">
            <?= $content ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <a href="http://yiister.ru">Yiister</a> <?= date("Y") ?>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
