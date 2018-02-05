<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ramigos;

/**
 * RActividadSearch represents the model behind the search form of `app\models\Ramigos`.
 */
class RActividadSearch extends Ramigos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rIdAmigos', 'rut1', 'rut2'], 'integer'],
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
        $query = Ramigos::find();

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
            'rIdAmigos' => $this->rIdAmigos,
            'rut1' => $this->rut1,
            'rut2' => $this->rut2,
        ]);

        return $dataProvider;
    }
}
