<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%freebies}}".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $category_id
 * @property int $supplier_id
 * @property int $unit_id
 * @property double $price
 * @property double $qty
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Freebies extends \yii\db\ActiveRecord
{
    public $image_input;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%freebies}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description',], 'required'],
            [['description', 'image'], 'string'],
            [['category_id', 'supplier_id', 'unit_id', 'user_id'], 'integer'],
            [['price', 'qty'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 256],
            [['status'], 'integer', 'max' => 9],
            [['image_input'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png'],
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
            'name' => 'Name',
            'description' => 'Description',
            'category_id' => 'Category',
            'supplier_id' => 'Supplier',
            'unit_id' => 'Measurement',
            'price' => 'Price',
            'qty' => 'Quantity',
            'status' => 'Status',
            'image_input' => 'Upload Featured Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getMeasurement()
    {
        return $this->hasOne(Measurement::className(), ['id' => 'unit_id']);
    }

    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'supplier_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function get_price()
    {
        return '₱ ' . number_format($this->price, 2);
    }

    public function get_name()
    {
        return ucwords($this->name);
    }

    public function get_description()
    {
        return ucwords($this->description);
    }


    public function get_created_at()
    {
        return date('F d, Y', strtotime($this->created_at));
    }

     public function get_updated_at()
    {
        return date('F d, Y', strtotime($this->updated_at));
    }


    public function upload($uploadPath)
    {
        if ($this->validate() && $this->image_input) { 
            

            $path = $uploadPath.
                $this->image_input->baseName . '.' . 
                $this->image_input->extension;

            $this->image_input->saveAs($path, false);

            $this->image = $path;

            return true;
        }
        return false;
    }
}
