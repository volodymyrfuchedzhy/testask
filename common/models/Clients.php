<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $status
 * @property int $country
 * @property string $note
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'country'], 'required'],
            [['name'], 'unique', 'targetAttribute' => ['name', 'user_id'], "message" => "You already have such client."],
            [['user_id', 'status', 'country'], 'integer'],
            [['note'], 'string'],
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
            'status' => 'Status',
            'country' => 'Country',
            'note' => 'Note',
        ];
    }
}
