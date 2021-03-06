<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SifatAgenda;

/**
 * SifatAgendaSearch represents the model behind the search form about `app\models\SifatAgenda`.
 */
class SifatAgendaSearch extends SifatAgenda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sifat_agenda'], 'integer'],
            [['nama_sifat_agenda'], 'safe'],
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
        $query = SifatAgenda::find();

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
            'id_sifat_agenda' => $this->id_sifat_agenda,
        ]);

        $query->andFilterWhere(['like', 'nama_sifat_agenda', $this->nama_sifat_agenda]);

        return $dataProvider;
    }
}
