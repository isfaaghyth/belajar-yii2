<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\RombonganBelajar;

/**
 * RombonganBelajarSearch represents the model behind the search form about `frontend\models\RombonganBelajar`.
 */
class RombonganBelajarSearch extends RombonganBelajar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'thn_masuk'], 'integer'],
            [['kode', 'dosen_pa'], 'safe'],
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
        $query = RombonganBelajar::find();

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
            'thn_masuk' => $this->thn_masuk,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'dosen_pa', $this->dosen_pa]);

        return $dataProvider;
    }
}
