<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%egift}}".
 *
 * @property int $id
 * @property int $merchant_id
 * @property int $category_id
 * @property string $description
 * @property string $date_start
 * @property string $date_end
 * @property string $referral_code
 * @property string $image
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Egift extends \yii\db\ActiveRecord
{
    public $image_banner_input;
    public $image_input;
    public $branches;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%egift}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promo', 'stock', 'merchant_id', 'description','name', ], 'required'],
            [['image_input', 'image_banner_input',], 'required', 'on' => 'create'],
            [['merchant_id', 'category_id'], 'integer'],
            [['description', 'image', 'qr_image', 'image_banner'], 'string'],
            [['created_at', 'updated_at', 'branches', 'start_at', 'end_at'], 'safe'],
            [['referral_code', 'qr_code'], 'string', 'max' => 128],
            [['status', 'promo'], 'integer', 'max' => 9],
            [['orig_price', 'sale_price', 'stock'], 'number'],
            [['sale_price'], 'validateSale'],

            [['image_input'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png'],
            [['image_banner_input'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Egift Name',
            'promo' => 'On-Promo',
            'start_at' => 'Start at',
            'end_at' => 'End at',
            'merchant_id' => 'Merchant',
            'category_id' => 'Category',
            'branches' => 'Branches',
            'description' => 'Description',
            'stock' => 'Stock',
            'referral_code' => 'Referral Code',
            'image' => 'Featured Image',
            'qr_image' => 'QR',
            'qr_code' => 'QR Code',
            'image_banner_input' => 'Upload Egift Banner Image',
            'image_input' => 'Upload Featured Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'qr' => 'QR'
        ];
    }


    public function getMerchant()
    {
        return $this->hasOne(User::className(), ['id' => 'merchant_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }



    public function getEgiftBranches()
    {
        return $this->hasMany(EgiftBranches::className(), ['egift_id' => 'id']);
    }



    public function getBranchesList()
    {
        return $this->hasMany(Branches::className(), ['id' => 'branch_id'])
            ->via('egiftBranches');
    }


    public function getEgiftFreebies()
    {
        return $this->hasMany(EgiftFreebies::className(), ['egift_id' => 'id']);
    }


    public function getPriceVariety()
    {
        return $this->hasMany(PriceVariety::className(), ['egift_id' => 'id']);
    }


    public function validateSale($attr, $params)
    {
        if ($this->sale_price > $this->orig_price) {
            return $this->addError($attr, 'Sale price must Lesser than original price');
        }
    }

    public function get_name()
    {
        return ucwords($this->name);
    }

    public function get_description()
    {
        return ucfirst($this->description);
    }
 

    public function get_created_at()
    {
        return date('F d, Y', strtotime($this->created_at));
    }

    public function get_updated_at()
    {
        return date('F d, Y', strtotime($this->updated_at));
    }

  

    public function getQr()
    {
        return Yii::$app->view->render('qr_image', ['qr_image' => $this->qr_image]);
    }


    public function get_branches()
    {
        if($this->branches) {
            return ($this->branches) ? json_decode($this->branches): []; 
        }

        return [];
    }



    // public function getBranchesList($array = false, $branches=[])
    // {
    //     $ids = $this->get_branches();

    //     if ($array === true) {
    //         foreach ($ids as $id) {
    //             $branches[] = Branches::find()
    //                 ->where(['id' => $id])
    //                 ->one();
    //         }
            
    //         return $branches;
    //     }

    //     return Yii::$app->view->render('/egift/branches', [
    //         'model' => BranchesSearch::byBulkID($ids)
    //     ]);
    // }

    public function get_promo()
    {
        return Yii::$app->params['promo_status'][$this->promo];
    }


    public function upload($uploadPath)
    {
        if ($this->validate()) { 
            if ($this->image_input) {
                $image_path = $uploadPath.
                    $this->image_input->baseName . '.' . 
                    $this->image_input->extension;

                $this->image_input->saveAs($image_path, false);

                $this->image = $image_path;
            }
            

            if ($this->image_banner_input) {
                $image_banner_path = $uploadPath.
                    $this->image_banner_input->baseName . '.' . 
                    $this->image_banner_input->extension;

                $this->image_banner_input->saveAs($image_banner_path, false);

                $this->image_banner = $image_banner_path;
                }

            return true;
        }
        return false;
    }

}
