<?php
/**
 * Created by PhpStorm.
 * User: Hijarian
 * Date: 04.07.14
 * Time: 11:51
 */

namespace app\models\customer;

use yii\db\ActiveRecord;

class CustomerRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'customer';
    }

    public function rules()
    {
        return [
            ['id', 'number'],
            ['name', 'required'],
            ['name', 'string', 'max' => 256],
            ['birth_date', 'date', 'format' => 'Y-m-d'],
            ['notes', 'safe']
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => \yii\behaviors\TimestampBehavior::className(),
            'blame' => \yii\behaviors\BlameableBehavior::className()
        ];
    }

    public function getPhones()
    {
        return $this->hasMany(PhoneRecord::className(), ['customer_id' => 'id']);
    }

    public function getAddresses()
    {
        return $this->hasMany(AddressRecord::className(), ['customer_id' => 'id']);
    }

    public function getEmails()
    {
        return $this->hasMany(EmailRecord::className(), ['customer_id' => 'id']);
    }
}
