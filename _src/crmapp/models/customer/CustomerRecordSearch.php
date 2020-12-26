<?php

namespace app\models\customer;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\customer\CustomerRecord;

/**
 * CustomerRecordSearch represents the model behind the search form about `app\models\customer\CustomerRecord`.
 */
class CustomerRecordSearch extends CustomerRecord
{

    public $country;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name', 'birth_date', 'notes', 'country'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = CustomerRecord::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith('addresses');
        $dataProvider->sort->attributes['country'] = [
            'asc' => ['address.country' => SORT_ASC],
            'desc' => ['address.country' => SORT_DESC]
        ];

        $query->joinWith('emails');
        $dataProvider->sort->attributes['email'] = [
            'asc' => ['email.address' => SORT_ASC],
            'desc' => ['email.address' => SORT_DESC],
        ];

        $query->joinWith('phones');
        $dataProvider->sort->attributes['phone'] = [
            'asc' => ['phone.number' => SORT_ASC],
            'desc' => ['phone.number' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'customer.id' => $this->id,
            'birth_date' => $this->birth_date,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        $query->andWhere(['like', 'address.country', $this->country]);


        return $dataProvider;
    }
}
