<?php

/**
 * This is the model class for table "product_fg_code".
 *
 * The followings are the available columns in table 'product_fg_code':
 * @property integer $id
 * @property string $fg_code
 * @property integer $product_colour_id
 * @property integer $price
 * @property string $description
 * @property integer $stock
 * @property integer $min_stock_notif
 * @property string $status
 * @property string $input_date
 * @property string $input_by
 * @property string $update_date
 * @property string $update_by
 *
 * The followings are the available model relations:
 * @property ProductColour $productColour
 */
class ProductFgCode extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_fg_code';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_colour_id, price, stock, min_stock_notif', 'numerical', 'integerOnly'=>true),
			array('fg_code, input_by, update_by', 'length', 'max'=>255),
			array('status', 'length', 'max'=>8),
			array('description, input_date, update_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fg_code, product_colour_id, price, description, stock, min_stock_notif, status, input_date, input_by, update_date, update_by', 'safe', 'on'=>'search'),
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
			'productColour' => array(self::BELONGS_TO, 'ProductColour', 'product_colour_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fg_code' => 'Fg Code',
			'product_colour_id' => 'Product Colour',
			'price' => 'Price',
			'description' => 'Description',
			'stock' => 'Stock',
			'min_stock_notif' => 'Min Stock Notif',
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
		$criteria->compare('fg_code',$this->fg_code,true);
		$criteria->compare('product_colour_id',$this->product_colour_id);
		$criteria->compare('price',$this->price);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('min_stock_notif',$this->min_stock_notif);
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
	 * @return ProductFgCode the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
