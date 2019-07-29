<?php
/**
 * UserForgot
 * 
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2017 OMMU (www.ommu.co)
 * @created date 22 October 2017, 08:14 WIB
 * @modified date 2 May 2018, 13:16 WIB
 * @link https://github.com/ommu/mod-users
 *
 * This is the model class for table "_user_forgot".
 *
 * The followings are the available columns in table "_user_forgot":
 * @property integer $forgot_id
 * @property integer $expired
 * @property integer $forgot_day_left
 * @property integer $forgot_hour_left
 *
 */

namespace ommu\users\models\view;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

class UserForgot extends \app\components\ActiveRecord
{
	public $gridForbiddenColumn = [];

	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return '_user_forgot';
	}

	/**
	 * @return string the primarykey column
	 */
	public static function primaryKey()
	{
		return ['forgot_id'];
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return [
			[['forgot_id', 'expired', 'forgot_day_left', 'forgot_hour_left'], 'integer'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
			'forgot_id' => Yii::t('app', 'Forgot'),
			'expired' => Yii::t('app', 'Expired'),
			'forgot_day_left' => Yii::t('app', 'Forgot Day Left'),
			'forgot_hour_left' => Yii::t('app', 'Forgot Hour Left'),
		];
	}

	/**
	 * Set default columns to display
	 */
	public function init()
	{
		parent::init();

		if(!(Yii::$app instanceof \app\components\Application))
			return;

		$this->templateColumns['_no'] = [
			'header' => Yii::t('app', 'No'),
			'class' => 'yii\grid\SerialColumn',
			'contentOptions' => ['class'=>'center'],
		];
		$this->templateColumns['forgot_id'] = [
			'attribute' => 'forgot_id',
			'value' => function($model, $key, $index, $column) {
				return $model->forgot_id;
			},
		];
		$this->templateColumns['expired'] = [
			'attribute' => 'expired',
			'value' => function($model, $key, $index, $column) {
				return $model->expired;
			},
		];
		$this->templateColumns['forgot_day_left'] = [
			'attribute' => 'forgot_day_left',
			'value' => function($model, $key, $index, $column) {
				return $model->forgot_day_left;
			},
		];
		$this->templateColumns['forgot_hour_left'] = [
			'attribute' => 'forgot_hour_left',
			'value' => function($model, $key, $index, $column) {
				return $model->forgot_hour_left;
			},
		];
	}

	/**
	 * User get information
	 */
	public static function getInfo($id, $column=null)
	{
		if($column != null) {
			$model = self::find();
			if(is_array($column))
				$model->select($column);
			else
				$model->select([$column]);
			$model = $model->where(['forgot_id' => $id])->one();
			return is_array($column) ? $model : $model->$column;
			
		} else {
			$model = self::findOne($id);
			return $model;
		}
	}
}
