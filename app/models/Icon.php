<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%icon}}".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Icon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%icon}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 191],
            [['status'], 'integer', 'max' => 9],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function get_icon()
    {
        return '<i class="'.$this->name .'"></i>';
    }
}
