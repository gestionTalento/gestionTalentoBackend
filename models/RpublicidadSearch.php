<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rpublicidad;

/**
 * RpublicidadSearch represents the model behind the search form of `app\models\Rpublicidad`.
 */
class RpublicidadSearch extends Rpublicidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ridPublicidad', 'rutEmpresa'], 'integer'],
            [['rdescripcion', 'rfoto'], 'safe'],
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
        $query = Rpublicidad::find();

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
            'ridPublicidad' => $this->ridPublicidad,
            'rutEmpresa' => $this->rutEmpresa,
        ]);

        $query->andFilterWhere(['like', 'rdescripcion', $this->rdescripcion])
            ->andFilterWhere(['like', 'rfoto', $this->rfoto]);

        return $dataProvider;
    }
}
