<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%personnel}}".
 *
 * @property int $id
 * @property string $fullname
 * @property string $company_name
 * @property string $position
 * @property string $self_description
 * @property string $inspiring_message
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Personnel extends \yii\db\ActiveRecord
{
    public $logo_input;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%personnel}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'company_name', 'position', 'self_description', 'inspiring_message'], 'required'],
            [['self_description', 'inspiring_message', 'logo'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['fullname', 'company_name', 'position'], 'string', 'max' => 191],
            [['status'], 'integer', 'max' => 9],
            [['logo_input'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png, svg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'logo_input' => 'Upload Image',
            'logo' => 'Image',
            'company_name' => 'Company Name',
            'position' => 'Position',
            'self_description' => 'Self Description',
            'inspiring_message' => 'Inspiring Message',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function get_fullname()
    {
        return ucwords($this->fullname);
    }

    public function get_company_name()
    {
        return ucwords($this->company_name);
    }

    public function get_position()
    {
        return ucwords($this->position);
    }

    public function get_self_description()
    {
        return ucfirst($this->self_description);
    }

    public function get_inspiring_message()
    {
        return ucfirst($this->inspiring_message);
    }

    public function get_status()
    {
        return Yii::$app->params['personnel_status'][$this->status];
    }


    public function upload($uploadPath)
    {
        if ($this->validate() && $this->logo_input) { 
            $path = $uploadPath .
                $this->logo_input->baseName . '.' . 
                $this->logo_input->extension;

            $this->logo_input->saveAs($path, false);

            $this->logo = $path;

            return true;
        }
        return false;
    }
}
