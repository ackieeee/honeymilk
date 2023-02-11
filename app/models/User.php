<?php

namespace app\models;

use app\models\db\User as DbUser;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public int $id;
    public string $username;
    public string $password;
    public ?string $authKey;
    public ?string $accessToken;

    public function __construct(int $id, string $username, string $password, ?string $authKey, ?string $accessToken)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->authKey = $authKey;
        $this->accessToken = $accessToken;
        parent::__construct();
    }
    // private static $users = [
    //     '100' => [
    //         'id' => '100',
    //         'username' => 'admin',
    //         'password' => 'admin',
    //         'authKey' => 'test100key',
    //         'accessToken' => '100-token',
    //     ],
    //     '101' => [
    //         'id' => '101',
    //         'username' => 'demo',
    //         'password' => 'demo',
    //         'authKey' => 'test101key',
    //         'accessToken' => '101-token',
    //     ],
    // ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = DbUser::findOne($id);
        return isset($user) ? new static(
            $user->id,
            $user->name,
            $user->password,
            $user->auth_key,
            $user->access_token
        ) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = DbUser::find()->where(['access_token' => $token])->one();
        return isset($user) ? new static(
            $user->id,
            $user->name,
            $user->password,
            $user->auth_key,
            $user->access_token
        ) : null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = DbUser::find()->where(['name' => $username])->one();
        return isset($user) ? new static(
            $user->id,
            $user->name,
            $user->password,
            $user->auth_key,
            $user->access_token
        ) : null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
