<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property string $id
 * @property string $customer_name
 * @property string $customer_address
 * @property string $customer_identity_type
 * @property string $customer_identity_number
 * @property string $customer_email
 * @property string $customer_mdn
 * @property string $customer_location_province
 * @property string $customer_location_city
 * @property string $customer_location_district
 * @property string $customer_delivery_address
 * @property string $product_category
 * @property string $product_name
 * @property string $product_colour
 * @property string $product_fg_code
 * @property string $product_price
 * @property string $payment_method
 * @property string $courier
 * @property string $courier_package
 * @property string $delivery_price
 * @property string $total_price
 * @property string $refference_number
 * @property string $payment_number
 * @property string $airwaybill
 * @property string $input_date
 * @property string $input_by
 * @property string $update_date
 * @property string $update_by
 *
 * The followings are the available model relations:
 * @property TransactionStatus[] $transactionStatuses
 */
class Transaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_name, customer_address, customer_identity_type, customer_identity_number, customer_email, customer_mdn, customer_location_province, customer_location_city, customer_location_district, customer_delivery_address, product_category, product_name, product_colour, product_fg_code, payment_method, courier, courier_package, delivery_price, refference_number, input_date, input_by, update_date, update_by', 'required'),
			array('customer_location_province, customer_location_city, customer_location_district, product_category, product_name, product_colour, product_fg_code, product_price, payment_method, courier, courier_package, delivery_price, total_price, refference_number, payment_number, airwaybill, input_by, update_by', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, customer_name, customer_address, customer_identity_type, customer_identity_number, customer_email, customer_mdn, customer_location_province, customer_location_city, customer_location_district, customer_delivery_address, product_category, product_name, product_colour, product_fg_code, product_price, payment_method, courier, courier_package, delivery_price, total_price, refference_number, payment_number, airwaybill, input_date, input_by, update_date, update_by', 'safe', 'on'=>'search'),
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
			'transactionStatuses' => array(self::HAS_MANY, 'TransactionStatus', 'transaction_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'customer_name' => 'Customer Name',
			'customer_address' => 'Customer Address',
			'customer_identity_type' => 'Customer Identity Type',
			'customer_identity_number' => 'Customer Identity Number',
			'customer_email' => 'Customer Email',
			'customer_mdn' => 'Customer Mdn',
			'customer_location_province' => 'Customer Location Province',
			'customer_location_city' => 'Customer Location City',
			'customer_location_district' => 'Customer Location District',
			'customer_delivery_address' => 'Customer Delivery Address',
			'product_category' => 'Product Category',
			'product_name' => 'Product Name',
			'product_colour' => 'Product Colour',
			'product_fg_code' => 'Product Fg Code',
			'product_price' => 'Product Price',
			'payment_method' => 'Payment Method',
			'courier' => 'Courier',
			'courier_package' => 'Courier Package',
			'delivery_price' => 'Delivery Price',
			'total_price' => 'Total Price',
			'refference_number' => 'Refference Number',
			'payment_number' => 'Payment Number',
			'airwaybill' => 'Airwaybill',
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
		$criteria->compare('customer_name',$this->customer_name,true);
		$criteria->compare('customer_address',$this->customer_address,true);
		$criteria->compare('customer_identity_type',$this->customer_identity_type,true);
		$criteria->compare('customer_identity_number',$this->customer_identity_number,true);
		$criteria->compare('customer_email',$this->customer_email,true);
		$criteria->compare('customer_mdn',$this->customer_mdn,true);
		$criteria->compare('customer_location_province',$this->customer_location_province,true);
		$criteria->compare('customer_location_city',$this->customer_location_city,true);
		$criteria->compare('customer_location_district',$this->customer_location_district,true);
		$criteria->compare('customer_delivery_address',$this->customer_delivery_address,true);
		$criteria->compare('product_category',$this->product_category,true);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_colour',$this->product_colour,true);
		$criteria->compare('product_fg_code',$this->product_fg_code,true);
		$criteria->compare('product_price',$this->product_price,true);
		$criteria->compare('payment_method',$this->payment_method,true);
		$criteria->compare('courier',$this->courier,true);
		$criteria->compare('courier_package',$this->courier_package,true);
		$criteria->compare('delivery_price',$this->delivery_price,true);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('refference_number',$this->refference_number,true);
		$criteria->compare('payment_number',$this->payment_number,true);
		$criteria->compare('airwaybill',$this->airwaybill,true);
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
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
