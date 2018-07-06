<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ClientPaymentMethodLink;

/**
 * ClientPaymentMethodLinkSearch represents the model behind the search form of `common\models\ClientPaymentMethodLink`.
 */
class ClientPaymentMethodLinkSearch extends ClientPaymentMethodLink
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'payment_method_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ClientPaymentMethodLink::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => Yii::$app->user->id,
            'client_id' => $this->client_id,
            'payment_method_id' => $this->payment_method_id,
        ]);

        return $dataProvider;
    }
}
