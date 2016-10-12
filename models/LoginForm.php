<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
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
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
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
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            if(Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0))
            {
                Yii::$app->session->set('user.level',AuthAssignment::find()->select('item_name')->where(['user_id' => Yii::$app->user->identity->id])->scalar()); 
               $pegawai1=Pegawai::find()->select(['id_unit','foto'])->where(['id_pegawai' => Yii::$app->user->identity->id_pegawai])->asArray()->one();
                Yii::$app->session->set('user.foto',$pegawai1['foto']);
                if(Yii::$app->user->identity->id_pegawai != 0){
                    Yii::$app->session->set('user.unit', $pegawai1['id_unit']);     
                }
                return true;
            }
            return false;
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
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
