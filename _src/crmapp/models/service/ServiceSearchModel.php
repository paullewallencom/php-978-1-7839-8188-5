<?php

namespace app\models\service;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\service\ServiceRecord;

/**
 * ServiceSearchModel represents the model behind the search form about `app\models\service\ServiceRecord`.
 */
class ServiceSearchModel extends ServiceRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hourly_rate'], 'integer'],
            [['name'], 'safe'],
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
        $query = ServiceRecord::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'hourly_rate' => $this->hourly_rate,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
