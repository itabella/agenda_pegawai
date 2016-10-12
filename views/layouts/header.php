<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">Aplikasi Perencanaan</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                        <?php if(Yii::$app->session->get('user.level')=== 'admin') {
                            echo "<img src=".Yii::getAlias('@web')."/uploads/admin.png class='user-image' alt='User Image' />";

                            }
                            else {
                                echo "<img src=".Yii::getAlias('@web')."/uploads/".Yii::$app->session->get('user.foto')." class='user-image' alt='User Image'/>";
                       
                            }
                            ?>
                        <span class="hidden-xs">
                             <?php if(Yii::$app->session->get('user.level') === 'admin') {
                                    echo "Super Admin</br>Logout";
                                   }
                                   elseif(Yii::$app->session->get('user.level') === 'peserta') {
                                    echo "Peserta";
                                   }
                                   else {
                                    echo "Operator Unit";
                                   }
                                ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <?php if(Yii::$app->session->get('user.level')=== 'admin') {
                            echo "<img src=".Yii::getAlias('@web')."/uploads/admin.png class='user-image' alt='User Image' />";

                            }
                            else {
                                echo "<img src=".Yii::getAlias('@web')."/uploads/".Yii::$app->session->get('user.foto')." class='user-image' alt='User Image'/>";
                       
                            }
                            ?>

                            <h4><?= @Yii::$app->user->identity->username ?></h4><br>
                            <p>

                                <?php if(Yii::$app->session->get('user.level') === 'admin') {
                                    echo "Super Admin";
                                   }
                                   elseif(Yii::$app->session->get('user.level') === 'peserta') {
                                    echo "Peserta";
                                   }
                                   else {
                                    echo "Operator Unit";
                                   }
                                ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
               
            </ul>
        </div>
    </nav>
</header>
