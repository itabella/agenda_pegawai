<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AgendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DAFTAR AGENDA';
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
<div class="agenda-index">
    <center>
    <h1><?= Html::encode($this->title) ?></h1>
    </center></br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Agenda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table border="0" height="100px" width="1080px"  align="center">
     <tr ><td>

    <?php
	$urlKoneksi = $urlKoneksi = Url::to(['agenda-peserta/detail']);
	$JSclick = <<<EOF
         function(date, jsEvent, view) { 
            modalx = $('#modal-detail');
                $.get(
                    '{$urlKoneksi}',
                    { 'date' : date.format() },
                    function(data) {
                        modalx.find('.modal-body').html(data);
                        modalx.modal('show');
                    }
                )
        }
EOF;
	echo \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,
	 'clientOptions' => [
                    'selectable' => true,
                    'selectHelper' => true,
                    'droppable' => true,
                    'editable' => true,
                    'dayClick' => new JsExpression($JSclick),
                    'defaultDate' => date('Y-m-d')
              ],
    ));
?>
</td></tr></table>

<?php
        Modal::begin([
        'header' => '<h4>Detail</h4>',
        'id' => 'modal-detail',
        'size' => 'modal-lg',
        ]); 

        echo "<div id='modalContent'><div>";
        Modal::end()
    ?>
</div>
