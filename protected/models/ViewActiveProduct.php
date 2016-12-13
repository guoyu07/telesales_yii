<?php

/**
 * This is the model class for table "view_active_product".
 *
 * The followings are the available columns in table 'view_active_product':
 * @property integer $category_id
 * @property integer $product_id
 * @property integer $colour_id
 * @property integer $fg_code_id
 * @property string $category
 * @property string $product
 * @property string $colour
 * @property string $fg_code
 * @property string $product_image_url
 * @property string $colour_image_url
 * @property string $product_description
 * @property integer $price
 */
class ViewActiveProduct extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'view_active_product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, product_id, colour_id, fg_code_id, price', 'numerical', 'integerOnly'=>true),
			array('category, product, colour, fg_code', 'length', 'max'=>255),
			array('product_image_url, colour_image_url, product_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('category_id, product_id, colour_id, fg_code_id, category, product, colour, fg_code, product_image_url, colour_image_url, product_description, price', 'safe', 'on'=>'search'),
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
			'category_id' => 'Category',
			'product_id' => 'Product',
			'colour_id' => 'Colour',
			'fg_code_id' => 'Fg Code',
			'category' => 'Category',
			'product' => 'Product',
			'colour' => 'Colour',
			'fg_code' => 'Fg Code',
			'product_image_url' => 'Product Image Url',
			'colour_image_url' => 'Colour Image Url',
			'product_description' => 'Product Description',
			'price' => 'Price',
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

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('colour_id',$this->colour_id);
		$criteria->compare('fg_code_id',$this->fg_code_id);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('product',$this->product,true);
		$criteria->compare('colour',$this->colour,true);
		$criteria->compare('fg_code',$this->fg_code,true);
		$criteria->compare('product_image_url',$this->product_image_url,true);
		$criteria->compare('colour_image_url',$this->colour_image_url,true);
		$criteria->compare('product_description',$this->product_description,true);
		$criteria->compare('price',$this->price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ViewActiveProduct the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
