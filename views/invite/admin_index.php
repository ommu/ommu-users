<?php
/**
 * User Invites (user-invites)
 * @var $this yii\web\View
 * @var $this app\modules\user\controllers\InviteController
 * @var $model app\modules\user\models\UserInvites
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 ECC UGM (ecc.ft.ugm.ac.id)
 * @created date 23 October 2017, 08:27 WIB
 * @modified date 8 May 2018, 00:41 WIB
 * @link http://ecc.ft.ugm.ac.id
 *
 */

use yii\helpers\Html;
use yii\helpers\Url;
use app\libraries\grid\GridView;
use yii\widgets\Pjax;

$this->params['breadcrumbs'][] = $this->title;

$this->params['menu']['content'] = [
	['label' => Yii::t('app', 'Add User Invite'), 'url' => Url::to(['create']), 'icon' => 'plus-square'],
	['label' => Yii::t('app', 'View Invites Data'), 'url' => Url::to(['history-invite/index']), 'icon' => 'table'],
];
$this->params['menu']['option'] = [
	//['label' => Yii::t('app', 'Search'), 'url' => 'javascript:void(0);'],
	['label' => Yii::t('app', 'Grid Option'), 'url' => 'javascript:void(0);'],
];
?>

<?php Pjax::begin(); ?>

<?php //echo $this->render('_search', ['model' => $searchModel]); ?>

<?php echo $this->render('_option_form', ['model' => $searchModel, 'gridColumns' => GridView::getActiveDefaultColumns($columns), 'route' => $this->context->route]); ?>

<?php 
$columnData = $columns;
array_push($columnData, [
	'class' => 'yii\grid\ActionColumn',
	'header' => Yii::t('app', 'Option'),
	'contentOptions' => [
		'class'=>'action-column',
	],
	'buttons' => [
		'view' => function ($url, $model, $key) {
			$url = Url::to(['view', 'id'=>$model->primaryKey]);
			return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => Yii::t('app', 'Detail User Invite')]);
		},
		'update' => function ($url, $model, $key) {
			$url = Url::to(['update', 'id'=>$model->primaryKey]);
			return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => Yii::t('app', 'Update User Invite')]);
		},
		'delete' => function ($url, $model, $key) {
			$url = Url::to(['delete', 'id'=>$model->primaryKey]);
			return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
				'title' => Yii::t('app', 'Delete User Invite'),
				'data-confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
				'data-method'  => 'post',
			]);
		},
	],
	'template' => '{view}{delete}',
]);

echo GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'layout' => '<div class="row"><div class="col-sm-12">{items}</div></div><div class="row sum-page"><div class="col-sm-5">{summary}</div><div class="col-sm-7">{pager}</div></div>',
	'columns' => $columnData,
]); ?>

<?php Pjax::end(); ?>