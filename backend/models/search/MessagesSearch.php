<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Messages;


class MessagesSearch extends Messages
{
    
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'email', 'message'], 'trim'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Messages::find();

        $query->groupBy('{{%messages}}.id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;
        }

        $query->andFilterWhere([
            '{{%messages}}.id' => $this->id,
            '{{%messages}}.message' => $this->message,
            '{{%messages}}.name' => $this->name,
            '{{%messages}}.email' => $this->email,
        ]);

        return $dataProvider;
    }
}
