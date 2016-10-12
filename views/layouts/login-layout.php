
<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

if (Yii::$app->controller->action->id === 'login') {
    echo $this->render(
        'login/wrapper-black',
        ['content' => $content]
    );
} else {
    \app\assets\AdminLteAsset::register($this);
    \app\assets\AppAsset::register($this);
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <!-- <title>jajajajajajjaajaj</title> -->
        <?php $this->head() ?>
    </head>
    <body class="skin-black">
    <?php $this->beginBody() ?>

    <?= $this->render(
        'login/header.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">

        <?= $this->render(
            'login/left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'login/content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>