<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contact;

class ContactSearch extends Contact
{
    public function rules()
    {
        return [
            [['id', 'category_id', 'rating'], 'integer'],
            [['shortname', 'fullname', 'celphone', 'phone', 'mail', 'website', 'blog', 'facebookpage', 'twitterpage', 'googlepluspage', 'description', 'avatar'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Contact::find();

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
            'category_id' => $this->category_id,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'shortname', $this->shortname])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'celphone', $this->celphone])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'blog', $this->blog])
            ->andFilterWhere(['like', 'facebookpage', $this->facebookpage])
            ->andFilterWhere(['like', 'twitterpage', $this->twitterpage])
            ->andFilterWhere(['like', 'googlepluspage', $this->googlepluspage])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
}