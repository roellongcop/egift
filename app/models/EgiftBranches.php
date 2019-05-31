<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%egift_branches}}".
 *
 * @property int $id
 * @property int $egift_id
 * @property int $branch_id
 */
class EgiftBranches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%egift_branches}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['egift_id', 'branch_id'], 'required'],
            [['egift_id', 'branch_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'egift_id' => 'Egift ID',
            'branch_id' => 'Branch ID',
        ];
    }

    public function getBranches()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branch_id']);
    }
}
