<?php
/**
 * m210909_203212_users_module_create_table_level
 * 
 * @author Putra Sudaryanto <putra@ommu.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2021 OMMU (www.ommu.id)
 * @created date 9 September 2021, 20:32 WIB
 * @link https://github.com/ommu/mod-users
 *
 */

use Yii;
use yii\db\Schema;

class m210909_203212_users_module_create_table_level extends \yii\db\Migration
{
	public function up()
	{
		$tableOptions = null;
		if ($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}
		$tableName = Yii::$app->db->tablePrefix . 'ommu_user_level';
		if (!Yii::$app->db->getTableSchema($tableName, true)) {
			$this->createTable($tableName, [
				'level_id' => Schema::TYPE_SMALLINT . '(5) UNSIGNED NOT NULL AUTO_INCREMENT',
				'name' => Schema::TYPE_INTEGER . '(11) UNSIGNED NOT NULL COMMENT \'trigger[delete]\'',
				'desc' => Schema::TYPE_INTEGER . '(11) UNSIGNED NOT NULL COMMENT \'trigger[delete],text\'',
				'default' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'0\' COMMENT \'Default,No\'',
				'signup' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'0\' COMMENT \'Enable,Disable#trigger[insert,update]\'',
				'assignment_roles' => Schema::TYPE_TEXT . ' NOT NULL COMMENT \'json\'',
				'message_allow' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'message_limit' => Schema::TYPE_TEXT . ' NOT NULL COMMENT \'serialize\'',
				'profile_block' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'profile_search' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'profile_privacy' => Schema::TYPE_TEXT . ' NOT NULL COMMENT \'serialize\'',
				'profile_comments' => Schema::TYPE_TEXT . ' NOT NULL COMMENT \'serialize\'',
				'profile_style' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'profile_style_sample' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'profile_status' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'profile_invisible' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'profile_views' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'profile_change' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'profile_delete' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'photo_allow' => Schema::TYPE_TINYINT . '(1) NOT NULL DEFAULT \'1\'',
				'photo_size' => Schema::TYPE_TEXT . ' NOT NULL COMMENT \'serialize\'',
				'photo_exts' => Schema::TYPE_TEXT . ' NOT NULL COMMENT \'serialize\'',
				'creation_date' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT \'trigger\'',
				'creation_id' => Schema::TYPE_INTEGER . '(11) UNSIGNED',
				'modified_date' => Schema::TYPE_TIMESTAMP . ' NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT \'trigger\'',
				'modified_id' => Schema::TYPE_INTEGER . '(11) UNSIGNED',
				'PRIMARY KEY ([[level_id]])',
			], $tableOptions);

            $this->createIndex(
                'name',
                $tableName,
                ['name']
            );
		}
	}

	public function down()
	{
		$tableName = Yii::$app->db->tablePrefix . 'ommu_user_level';
		$this->dropTable($tableName);
	}
}
