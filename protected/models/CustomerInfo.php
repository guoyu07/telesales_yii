<?php

/**
 * This is the model class for table "customer_info".
 *
 * The followings are the available columns in table 'customer_info':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $identity_type
 * @property string $identity_number
 * @property string $email
 * @property string $mdn
 * @property integer $location_district_id
 * @property string $delivery_address
 * @property string $input_date
 * @property string $input_by
 * @property string $update_date
 * @property string $update_by
 *
 * The followings are the available model relations:
 * @property LocationDistrict $locationDistrict
 */
class CustomerInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('location_district_id', 'numerical', 'integerOnly'=>true),
			array('input_by, update_by', 'length', 'max'=>255),
			array('name, address, identity_type, identity_number, email, mdn, delivery_address, input_date, update_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, address, identity_type, identity_number, email, mdn, location_district_id, delivery_address, input_date, input_by, update_date, update_by', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'address' => 'Address',
			'identity_type' => 'Identity Type',
			'identity_number' => 'Identity Number',
			'email' => 'Email',
			'mdn' => 'Mdn',
			'location_district_id' => 'Location District',
			'delivery_address' => 'Delivery Address',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('identity_type',$this->identity_type,true);
		$criteria->compare('identity_number',$this->identity_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('mdn',$this->mdn,true);
		$criteria->compare('location_district_id',$this->location_district_id);
		$criteria->compare('delivery_address',$this->delivery_address,true);
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
	 * @return CustomerInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
