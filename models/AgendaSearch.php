<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Agenda;

/**
 * AgendaSearch represents the model behind the search form about `app\models\Agenda`.
 */
class AgendaSearch extends Agenda
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agenda', 'update_by', 'id_jenis_agenda', 'id_sifat_agenda', 'id_unit'], 'integer'],
            [['nama_agenda', 'tanggal', 'keterangan', 'tanggal_entry'], 'safe'],
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
        $query = Agenda::find();

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
            'id_agenda' => $this->id_agenda,
            'tanggal' => $this->tanggal,
            'tanggal_entry' => $this->tanggal_entry,
            'update_by' => $this->update_by,
            'id_jenis_agenda' => $this->id_jenis_agenda,
            'id_sifat_agenda' => $this->id_sifat_agenda,
            'id_unit' => $this->id_unit,
        ]);

        $query->andFilterWhere(['like', 'nama_agenda', $this->nama_agenda])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
