<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $name;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name'], 'required', 'message' => 'ユーザー名を入力してください'],
            [['password'], 'required', 'message' => 'パスワードを入力してください'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validateHashPassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'ユーザー名',
            'rememberMe' => '記憶する',
            'password' => 'パスワード',
        ];
    }

    public function validateHashPassword($attribute, $params): void
    {
        if ($this->hasErrors()) {
            return;
        }
        $user = $this->getUser();
        if (empty($user)) {
            $this->addError($attribute, 'ユーザー名かパスワードが間違えています');
            return;
        }

        if (!Yii::$app->getSecurity()->validatePassword($this->password, $user->password)) {
            $this->addError($attribute, 'ユーザー名かパスワードが間違えています');
            return;
        }
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->name);
        }

        return $this->_user;
    }
}
