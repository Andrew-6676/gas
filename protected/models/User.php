<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $login
 * @property string $pass
 * @property string $fio
 * @property string $email
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property UserGroup[] $userGroups
 */
class User extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('active', 'numerical', 'integerOnly'=>true),
            array('login', 'length', 'max'=>15),
            array('pass', 'length', 'max'=>32),
            array('fio', 'length', 'max'=>150),
            array('email', 'length', 'max'=>50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, login, pass, fio, email, active', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'userGroups' => array(self::HAS_MANY, 'UserGroup', 'id_user'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'login' => 'Логин',
            'pass' => 'Пароль',
            'fio' => 'ФИО',
            'email' => 'Email',
            'active' => 'Active',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

       // $criteria->compare('id',$this->id);
        $criteria->compare('login',$this->login,true);
        //$criteria->compare('pass',$this->pass,true);
        $criteria->compare('fio',$this->fio,true);
        $criteria->compare('email',$this->email,true);
        //$criteria->compare('active',$this->active);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

/*------------------------------------------------------------------------------------------------*/
    public function getGroups() {
        $gr_arr = array('0');
        $gr = $this->userGroups;
        foreach ($gr as $val) {
            $gr_arr[] = $val->id_group;
        }
        return $gr_arr;
    }

}
