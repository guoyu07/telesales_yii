<?php

/**
 * This is the model class for table "courier_delivery_price".
 *
 * The followings are the available columns in table 'courier_delivery_price':
 * @property string $id
 * @property string $courier_location_mapping_id
 * @property string $courier_price_category_id
 * @property string $price
 * @property string $input_date
 * @property string $input_by
 * @property string $update_date
 * @property string $update_by
 *
 * The followings are the available model relations:
 * @property CourierLocationMapping $courierLocationMapping
 * @property CourierPriceCategory $courierPriceCategory
 */
class CourierDeliveryPrice extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'courier_delivery_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('courier_location_mapping_id, courier_price_category_id, price, input_by, update_by', 'length', 'max'=>255),
			array('input_date, update_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, courier_location_mapping_id, courier_price_category_id, price, input_date, input_by, update_date, update_by', 'safe', 'on'=>'search'),
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
			'courierLocationMapping' => array(self::BELONGS_TO, 'CourierLocationMapping', 'courier_location_mapping_id'),
			'courierPriceCategory' => array(self::BELONGS_TO, 'CourierPriceCategory', 'courier_price_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'courier_location_mapping_id' => 'Courier Location Mapping',
			'courier_price_category_id' => 'Courier Price Category',
			'price' => 'Price',
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
		$criteria->compare('courier_location_mapping_id',$this->courier_location_mapping_id,true);
		$criteria->compare('courier_price_category_id',$this->courier_price_category_id,true);
		$criteria->compare('price',$this->price,true);
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
	 * @return CourierDeliveryPrice the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
