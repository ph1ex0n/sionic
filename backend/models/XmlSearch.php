<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Xml;

/**
 * XmlSearch represents the model behind the search form of `backend\models\Xml`.
 */
class XmlSearch extends Xml
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
                [
                        [
                                'id',
                                'code',
                                'weight',
                                'quantity_0',
                                'quantity_1',
                                'quantity_2',
                                'quantity_3',
                                'quantity_4',
                                'quantity_5',
                                'quantity_6',
                                'quantity_7'],
                        'integer'],
                [
                        [
                                'name',
                                'usages'],
                        'safe'],
                [
                        [
                                'price_0',
                                'price_1',
                                'price_2',
                                'price_3',
                                'price_4',
                                'price_5',
                                'price_6',
                                'price_7'],
                        'number'],];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {

        // bypass scenarios() implementation in the parent class
        return Model ::scenarios();
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

        $query = Xml ::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
                'query' => $query,]);

        $this -> load($params);

        if (!$this -> validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query -> andFilterWhere([
                'id'         => $this -> id,
                'code'       => $this -> code,
                'weight'     => $this -> weight,
                'quantity_0' => $this -> quantity_0,
                'price_0'    => $this -> price_0,
                'quantity_1' => $this -> quantity_1,
                'price_1'    => $this -> price_1,
                'quantity_2' => $this -> quantity_2,
                'price_2'    => $this -> price_2,
                'quantity_3' => $this -> quantity_3,
                'price_3'    => $this -> price_3,
                'quantity_4' => $this -> quantity_4,
                'price_4'    => $this -> price_4,
                'quantity_5' => $this -> quantity_5,
                'price_5'    => $this -> price_5,
                'quantity_6' => $this -> quantity_6,
                'price_6'    => $this -> price_6,
                'quantity_7' => $this -> quantity_7,
                'price_7'    => $this -> price_7,]);

        $query -> andFilterWhere([
                'like',
                'name',
                $this -> name]) -> andFilterWhere([
                        'like',
                        'usages',
                        $this -> usages]);

        return $dataProvider;
    }
}
