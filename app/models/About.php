<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%about}}".
 *
 * @property int $id
 * @property string $logo
 * @property string $description
 * @property string $address
 * @property string $mission
 * @property string $vision
 * @property string $history
 * @property string $email
 * @property string $contact_no
 * @property string $facebook
 * @property string $twitter
 * @property string $instagram
 * @property string $yahoo
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class About extends \yii\db\ActiveRecord
{
    public $logo_input;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%about}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['logo', 'description', 'address', 'mission', 'vision', 'history', 'email', 'contact_no', 'facebook', 'twitter', 'instagram', 'yahoo', 'terms_and_condition', 'privacy_policy'], 'required'],
            [['logo', 'description', 'address', 'mission', 'vision', 'history', 'terms_and_condition', 'privacy_policy'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['email', 'contact_no', 'facebook', 'twitter', 'instagram', 'yahoo'], 'string', 'max' => 191],
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
            'terms_and_condition' => 'Terms and Condition', 
            'privacy_policy' => 'Privacy Policy',
            'logo_input' => 'Upload Logo',
            'logo' => 'Company Logo',
            'description' => 'Company Description',
            'address' => 'Address',
            'mission' => 'Mission',
            'vision' => 'Vision',
            'history' => 'History',
            'email' => 'Email',
            'contact_no' => 'Contact No',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
            'yahoo' => 'Yahoo',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    public function get_logo()
    {
        return Yii::$app->view->render('_logo', ['logo' => $this->logo]);
    }

    public function get_status()
    {
        return Yii::$app->params['branch_status'][$this->status];
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
