<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailAgendaPeserta;

/**
 * DetailAgendaPesertaSearch represents the model behind the search form about `app\models\DetailAgendaPeserta`.
 */
class DetailAgendaPesertaSearch extends DetailAgendaPeserta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_detail_agenda_peserta', 'id_agenda_peserta', 'id_pegawai'], 'integer'],
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
        $query = DetailAgendaPeserta::find();

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
            'id_detail_agenda_peserta' => $this->id_detail_agenda_peserta,
            'id_agenda_peserta' => $this->id_agenda_peserta,
            'id_pegawai' => $this->id_pegawai,
        ]);

        
        $query->addGroupBy('id_agenda_peserta');

        return $dataProvider;
    }
}
