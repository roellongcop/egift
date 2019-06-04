<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property string $tel_no
 * @property string $address
 * @property string $logo
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Profile extends \yii\db\ActiveRecord
{
    public $logo_banner_input;
    public $logo_input;
    public $authorized;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'tel_no', 'address', 'allowed_egifts'], 'required'],
            [['logo_banner_input', 'logo_input',], 'required', 'on' => 'create'],
            [['user_id', 'authorized'], 'integer'],
            [['description', 'address', 'logo', 'logo_banner'], 'string'],
            [['created_at', 'updated_at', 'nature_of_business'], 'safe'],
            [['name'], 'string', 'max' => 256],
            [['tel_no'], 'string', 'max' => 64],
            [['logo_banner_input'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png, svg'],
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
            'user_id' => 'User ID',
            'name' => 'Merchant Name',
            'authorized' => 'Authorized',
            'description' => 'Merchant Description',
            'tel_no' => 'Telephone No',
            'address' => 'Address',
            'logo' => 'Logo',
            '_status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            '_created' => 'Created At',
            '_updated' => 'Updated At',
            'logo_input' => 'Upload Company Image',
            'logo_banner_input' => 'Upload Company Banner Image',
        ];
    }


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getEmail()
    {
        if($this->user) {
            return $this->user->email;
        }

        return ;
    }


    public function getEgift()
    {
        return $this->hasMany(Egift::className(), ['merchant_id' => 'user_id']);
    }

    public function get_name()
    {
        return ucwords($this->name);
    }

    public function get_description()
    {
        return ucfirst($this->description);
    }

    public function get_address()
    {
        return ucfirst($this->address);
    }


    public function get_status()
    {
        return $this->user->_status;
    }

    public function get_logo()
    {
        return Yii::$app->view->render('_logo', ['logo' => $this->logo]);
    }

    public function getNatures()
    {
        $nature = json_decode($this->nature_of_business);

        return ($nature && is_array($nature)) ? $nature: []; 
    }

    public function get_nature_of_business()
    {
        $model = NatureOfBusinessSearch::byProfile($this->getNatures()) ;

        return Yii::$app->view->render('/merchant/nature_of_business', ['model' => $model]);
    }

    public function get_registrationLink()
    {
        return Yii::$app->view->render('/merchant/_registration-link', ['auth_key' => $this->user->auth_key]);
    }


    public function get_created()
    {
        return date("F d, Y H:i A", strtotime($this->created_at));
    }

    public function get_updated()
    {
        return date("F d, Y H:i A", strtotime($this->updated_at));
    }

     
    public function upload($uploadPath)
    {
        if ($this->validate()) {
            if ($this->logo_input) {
                $logo_path = $uploadPath .
                    $this->logo_input->baseName . '.' . 
                    $this->logo_input->extension;

                $this->logo_input->saveAs($logo_path, false);

                $this->logo = $logo_path;
            } 


            if ($this->logo_banner_input) {
                $logo_banner_path = $uploadPath .
                    $this->logo_banner_input->baseName . '.' . 
                    $this->logo_banner_input->extension;

                $this->logo_banner_input->saveAs($logo_banner_path, false);

                $this->logo_banner = $logo_banner_path;
            } 

            return true;
        }
        return false;
    }
}
