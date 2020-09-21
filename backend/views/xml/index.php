<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Xml;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\XmlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this -> title = 'Imported goods';
$this -> params['breadcrumbs'][] = $this -> title;
$cities = [
        'Moscow',
        'Saint Petersburg',
        'Novosibirsk',
        'Yekaterinburg',
        'Kazan',
        'Nizhny Novgorod',
        'Chelyabinsk',
        'Samara'];
?>
<div class="xml-index">
    <h2><?=Html ::encode($this -> title)?></h2><?php
    echo Html ::dropDownList('import_files', null, $cities, $options = ['class' => 'btn btn-success']);
    echo '&nbsp;';
    echo '<button type="button" class="btn btn-success btn-sm">Select</button>';
    Pjax ::begin();
    try {
        echo GridView ::widget([
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'layout'       => "{pager}{summary}{items}{pager}",
                'tableOptions' => ['class' => 'table table-striped table-hover table-condensed'],
                'columns'      => [
                        'name',
                        'code',
                        'weight',
                        'quantity_0',
                        'price_0',
                        [
                                'attribute'      => 'usages',
                                'contentOptions' => ['style' => 'white-space: pre-wrap']]]]);
    } catch (Exception $e) {
    }
    Pjax ::end(); ?>
</div>
