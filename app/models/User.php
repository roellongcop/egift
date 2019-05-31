<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property int $user_type
 * @property string $access_token
 * @property string $auth_key
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $profile_name;
    public $password_repeat;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'role_id'], 'required'],
            [['password', 'password_repeat', 'status'], 'required', 'on' => ['create', 'update']],
            [['created_at', 'updated_at'], 'safe'],
            [['username'], 'string', 'max' => 30],
            [['email', 'access_token', 'auth_key'], 'string', 'max' => 256],
            [['password', 'password_repeat'], 'string', 'max' => 200, 'min' => 6],
            [['password_repeat'], 'checkPassword', 'on' => ['create', 'update']],
            [['user_type', 'status', 'role_id'], 'integer'],
            [['email', 'access_token', 'auth_key'], 'unique'],
            [['email', ], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role',
            'username' => 'Username',
            'password' => 'Password',
            'user_type' => 'User Type',
            'access_token' => 'Access Token',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            '_created' => 'Registered',
            '_updated' => 'Updated At',
        ];
    }


    public function checkPassword($attribute, $params)
    {
        if ($this->password !== $this->password_repeat) {
            $this->addError($attribute, 'Password not match.');
        }
    }

    public function get_user_type()
    {
        return Yii::$app->params['user_type'][$this->user_type];
    }

    public function get_created()
    {
        return date("F d, Y H:i A", strtotime($this->created_at));
    }

    public function get_updated()
    {
        return date("F d, Y H:i A", strtotime($this->updated_at));
    }

   


     /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        return null;
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        if (($model = User::findOne(['access_token' => $token])) !== null) {
            return $model;
        }
        return null;
    }


    public static function findByAuthkey($auth_key="")
    {
        if (($model = User::findOne(['auth_key' => $auth_key])) !== null) {
            return $model;
        }
        return null;
    }

     

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return User::findOne(['username' => $username]);
    }


    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsernameAndStatus($username, $status)
    {
        return User::findOne(['username' => $username, 'status' => $status]);
    }


    public static function findByEmailAndStatus($email, $status)
    {
        return User::findOne(['email' => $email, 'status' => $status]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

 
    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }
  

    /**
     * Set password
     *
     */
    public function setPassword()
    {
        $this->password = Yii::$app->security->generatePasswordHash($this->password);
    }
 
    public function setAuthkey($length=10)
    {
        $string = Yii::$app->security->generateRandomString($length);
        $string = str_replace(['-', '_'], rand(0,9), $string);

        if ($this->findByAuthkey($string)) {
            $this->setAuthkey();
        }

        $this->auth_key = $string;
    }


    public function setAccessToken($length=10)
    {
        $string = Yii::$app->security->generateRandomString($length);
        $string = str_replace(['-', '_'], rand(0,9), $string);

        if ($this->findIdentityByAccessToken($string)) {
            $this->setAccessToken();
        }

        $this->access_token = $string;
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    public function get_status()
    {
        return Yii::$app->params['user_status'][$this->status];
    }

 

    public function createUsername($length=10)
    {
        $string = Yii::$app->security->generateRandomString($length);
        $string = str_replace(['-', '_'], rand(0,9), $string);

        if ($this->findByUsername($string)) {
            return $this->createUsername();
        }

        return $string;
    }

    public function getAuthorizationLink()
    {
        $link = Url::to(['site/authorization', 'auth_key' => $this->auth_key], true);

        return Html::a($link, $link, ['target' => '_blank']);
    }

    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    public function getNatureOfBusiness()
    {
        return $this->hasMany(NatureOfBusiness::className(), ['user_id' => 'id']);
    }


    public function get_nature_of_business()
    {
        $nature_of_business = $this->natureOfBusiness;

        $res = '';

        foreach ($nature_of_business as $key => $nature) {
            $res .= $nature->name . "\n";
        }

        return $res;
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) { 
            if ($this->isNewRecord) {
                $this->setAccessToken();

            } 

            $this->setAuthkey();
           

            return true;
        }
        return false;
    }


    
}
