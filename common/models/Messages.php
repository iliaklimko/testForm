<?php

namespace common\models;

use Yii;
use creocoder\translateable\TranslateableBehavior;
use yii\data\ActiveDataProvider;
use common\models\translations\ExcursionGroupsTranslation;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "{{%messages}}".
 *
 * @property integer $id
 * @property integer $updated_at
 * @property integer $created_at
 * @property string $name
 * @property string $email
 * @property string $message

 */
class Messages extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%messages}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
            return [
                [['id', 'created_at', 'updated_at'], 'integer'],
                [['name', 'email', 'message'], 'trim'],
            ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    public function getLastMessage()
    {
        $model = Messages:: find()->orderBy(['id' => SORT_DESC])->limit(1)->one();
        if (!empty($model)) {
            return $model->message;
        } else {
            return 'error';
        }
    }

}
