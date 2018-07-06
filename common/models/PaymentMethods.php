<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment_methods".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string $description
 */
class PaymentMethods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_methods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'description'], 'required'],
            [['name'], 'unique', 'targetAttribute' => ['name', 'user_id'], "message" => "You already have same cpayment method."],
            [['type'], 'integer'],
            [['user_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
        ];
    }
}
