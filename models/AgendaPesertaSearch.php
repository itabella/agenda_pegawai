<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AgendaPeserta;

/**
 * AgendaPesertaSearch represents the model behind the search form about `app\models\AgendaPeserta`.
 */
class AgendaPesertaSearch extends AgendaPeserta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agenda_peserta', 'update_by', 'id_agenda', 'id_unit'], 'integer'],
            [['nama_aktivitas', 'waktu_mulai','waktu_selesai', 'keterangan', 'tanggal_entry'], 'safe'],
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
        $query = AgendaPeserta::find();

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
            'id_agenda_peserta' => $this->id_agenda_peserta,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'tanggal_entry' => $this->tanggal_entry,
            'update_by' => $this->update_by,
            'id_agenda' => $this->id_agenda,
            'id_unit' => $this->id_unit,
        ]);

        $query->andFilterWhere(['like', 'nama_aktivitas', $this->nama_aktivitas])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
