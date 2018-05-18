<?php
/**
 * UsersQuery
 *
 * This is the ActiveQuery class for [[\ommu\users\models\Users]].
 * @see \ommu\users\models\Users
 * 
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2018 ECC UGM (ecc.ft.ugm.ac.id)
 * @created date 2 May 2018, 13:29 WIB
 * @link https://ecc.ft.ugm.ac.id
 *
 */

namespace ommu\users\models\query;

class UsersQuery extends \yii\db\ActiveQuery
{
	/*
	public function active()
	{
		return $this->andWhere('[[status]]=1');
	}
	*/

	/**
	 * @inheritdoc
	 * @return \ommu\users\models\Users[]|array
	 */
	public function all($db = null)
	{
		return parent::all($db);
	}

	/**
	 * @inheritdoc
	 * @return \ommu\users\models\Users|array|null
	 */
	public function one($db = null)
	{
		return parent::one($db);
	}
}
