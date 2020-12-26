<?php

namespace app\models\user;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\user\UserRecord;

/**
 * UserSearchModel represents the model behind the search form about `app\models\user\UserRecord`.
 */
class UserSearchModel extends UserRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['username'], 'safe'],
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
        $query = UserRecord::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
