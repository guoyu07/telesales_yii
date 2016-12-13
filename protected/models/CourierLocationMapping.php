<?php

/**
 * This is the model class for table "courier_location_mapping".
 *
 * The followings are the available columns in table 'courier_location_mapping':
 * @property string $id
 * @property integer $courier_package_id
 * @property integer $location_district_id
 * @property string $status
 * @property string $input_date
 * @property string $input_by
 * @property string $update_date
 * @property string $update_by
 *
 * The followings are the available model relations:
 * @property CourierDeliveryPrice[] $courierDeliveryPrices
 * @property CourierPackage $courierPackage
 * @property LocationDistrict $locationDistrict
 */
class CourierLocationMapping extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'courier_location_mapping';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courier_package_id, location_district_id', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>8),
			array('input_by, update_by', 'length', 'max'=>255),
			array('input_date, update_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, courier_package_id, location_district_id, status, input_date, input_by, update_date, update_by', 'safe', 'on'=>'search'),
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
			'courierDeliveryPrices' => array(self::HAS_MANY, 'CourierDeliveryPrice', 'courier_location_mapping_id'),
			'courierPackage' => array(self::BELONGS_TO, 'CourierPackage', 'courier_package_id'),
			'locationDistrict' => array(self::BELONGS_TO, 'LocationDistrict', 'location_district_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'courier_package_id' => 'Courier Package',
			'location_district_id' => 'Location District',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('courier_package_id',$this->courier_package_id);
		$criteria->compare('location_district_id',$this->location_district_id);
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
	 * @return CourierLocationMapping the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
