<?php

namespace app\models\customer;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property string $purpose
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $street
 * @property string $building
 * @property string $apartment
 * @property string $receiver_name
 * @property string $postal_code
 * @property integer $customer_id
 *
 * @property Customer $customer
 */
class AddressRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id'], 'integer'],
            [['purpose', 'country', 'state', 'city', 'street', 'building', 'apartment', 'receiver_name', 'postal_code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'purpose' => 'Purpose',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'street' => 'Street',
            'building' => 'Building',
            'apartment' => 'Apartment',
            'receiver_name' => 'Receiver Name',
            'postal_code' => 'Postal Code',
            'customer_id' => 'Customer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(CustomerRecord::className(), ['id' => 'customer_id']);
    }

    public function getFullAddress()
    {
        return implode(', ',
            array_filter(
                $this->getAttributes(
                    ['country', 'state', 'city', 'street', 'building', 'apartment'])));
    }

}
