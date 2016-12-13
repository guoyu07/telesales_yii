<?php

/**
 * This is the model class for table "location_district".
 *
 * The followings are the available columns in table 'location_district':
 * @property integer $id
 * @property string $name
 * @property integer $city_id
 * @property string $status
 * @property string $input_date
 * @property string $input_by
 * @property string $update_date
 * @property string $update_by
 *
 * The followings are the available model relations:
 * @property CourierLocationMapping[] $courierLocationMappings
 * @property CustomerInfo[] $customerInfos
 * @property LocationCity $city
 * @property PaymentMethodLocationMapping[] $paymentMethodLocationMappings
 */
class LocationDistrict extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'location_district';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('name, input_by, update_by', 'length', 'max'=>255),
			array('status', 'length', 'max'=>8),
			array('input_date, update_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, city_id, status, input_date, input_by, update_date, update_by', 'safe', 'on'=>'search'),
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
			'courierLocationMappings' => array(self::HAS_MANY, 'CourierLocationMapping', 'location_district_id'),
			'customerInfos' => array(self::HAS_MANY, 'CustomerInfo', 'location_district_id'),
			'city' => array(self::BELONGS_TO, 'LocationCity', 'city_id'),
			'paymentMethodLocationMappings' => array(self::HAS_MANY, 'PaymentMethodLocationMapping', 'location_district_id'),
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
			'city_id' => 'City',
			'status' => 'Status',
			'input_date' => 'Input Date',
			'input_by' => 'Input By',
			'update_date' => 'Update Date',
			'update_by' => 'Update By',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('input_date',$this->input_date,true);
		$criteria->compare('input_by',$this->input_by,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('update_by',$this->update_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LocationDistrict the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
