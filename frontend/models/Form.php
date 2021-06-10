<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Messages;


class Form extends Model
{
    public $name;
    public $email;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'message'], 'required', 'message' => 'Заполните пожалуйста поле'],
            ['email', 'email', 'message' => 'Некорректная почта'],
        ];
    }

    public function sendEmail($email, $message)
    {
        mail($email, "Сообщение с формы", $message);
        return true;
    }

    public function saveMessage($arrMessages)
    {
        $model = new Messages();
        if ($model->load($arrMessages) && $model->save()) {
            return true;
        }
    }
}
