<?php

namespace app\models\db;

use Yii;
use yii\db\ActiveRecord;

/**
 * User ActiveRecord
 */
class User extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'users';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
}
