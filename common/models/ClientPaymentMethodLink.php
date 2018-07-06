<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client_payment_method_link".
 *
 * @property int $id
 * @property int $user_id
 * @property int $client_id
 * @property int $payment_method_id
 */
class ClientPaymentMethodLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_payment_method_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'payment_method_id'], 'required'],
            [['user_id', 'client_id', 'payment_method_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'client_id' => 'Client ID',
            'payment_method_id' => 'Payment Method ID',
        ];
    }
}
