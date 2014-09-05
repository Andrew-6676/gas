<?php

/**
 * This is the model class for table "galery".
 *
 * The followings are the available columns in table 'galery':
 * @property integer $id
 * @property string $name
 * @property string $fname
 * @property string $url
 * @property string $descr
 */
class Galery extends CActiveRecord
{

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'galery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, url', 'length', 'max'=>100),
			array('fname', 'length', 'max'=>200),
			array('descr', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('name, descr', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'fname' => 'Fname',
			'url' => 'Url',
			'descr' => 'Descr',
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
		// $criteria->compare('name',$this->name,true);
		$criteria->compare('fname',$this->fname,true);
		// $criteria->compare('url',$this->url,true);
		$criteria->compare('descr',$this->descr,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Galery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/*---------------------------------------------------------------------------*/

	public function getUrl($type='small') {
		$url = Yii::app()->createUrl('/public/galery/none.jpg');
		switch ($type) {
			case 'small':
				$url = Yii::app()->createUrl('/public/galery/small/small_'.$this->fname);
				break;

			case 'big':
				$url = Yii::app()->createUrl('/public/galery/'.$this->fname);
				break;

			default:
				$url = Yii::app()->createUrl('/public/galery/none.jpg');
				break;
		}

		return $url;
	}
}
