<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%faq}}".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faq}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer',], 'required'],
            [['answer'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['question'], 'string', 'max' => 191],
            [['status'], 'integer', 'max' =>  9],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'answer' => 'Answer',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function get_question()
    {
        return ucfirst($this->question);
    }

    public function get_answer()
    {
        return ucfirst($this->answer);
    }

    public function get_status()
    {
        return Yii::$app->params['faq_status'][$this->status];
    }
}
