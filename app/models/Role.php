<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property int $id
 * @property int $user_type
 * @property string $access
 * @property string $created_at
 * @property string $updated_at
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 191],
            [['access',], 'string'],
            [['created_at', 'updated_at', 'actions', 'navigation'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Role Name',
            'access' => 'Access',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function get_name()
    {
        return ucwords($this->name);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['role_id' => 'id']);
    }


    public function getModules()
    {
        $access = $this->access ? json_decode($this->access, true): [];

        return array_keys($access);
    }


    



}
