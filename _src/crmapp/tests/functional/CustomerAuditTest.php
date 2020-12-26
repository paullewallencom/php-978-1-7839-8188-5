<?php


use app\models\customer\CustomerRecord;
use app\models\user\UserRecord;

class CustomerAuditTest extends \Codeception\TestCase\Test
{
   /**
    * @var \FunctionalTester
    */
    protected $tester;

    public function _after()
    {
        Yii::$app->user->logout();
    }

    /** @test */
    public function NewCustomerHasAuditInfo ()
    {
        // Dependencies
        $identity = UserRecord::findOne(['username' => 'RobAdmin']);
        $user = Yii::$app->user;

        // Given
        $user->login($identity);
        $customer = $this->imagineCustomerRecord();
        $before = time();
        $customer->save();
        $after = time();

        // When
        /** @var CustomerRecord $saved */
        $saved = CustomerRecord::findOne($customer->id);

        // Then
        $this->assertInstanceOf('app\models\customer\CustomerRecord', $saved);
        $this->assertBetween($before, $saved->created_at, $after);
        $this->assertEquals($user->id, $saved->created_by);
        $this->assertEquals($saved->created_at, $saved->updated_at);
        $this->assertEquals($saved->created_by, $saved->updated_by);
    }

    /** @test */
    public function CustomerRecordRemembersUpdateDatetimeAndUser()
    {
        // Dependencies
        $first_identity = UserRecord::findOne(['username' => 'RobAdmin']);
        $second_identity = UserRecord::findOne(['username' => 'AnnieManager']);
        $user = Yii::$app->user;

        // Given
        $user->login($first_identity);
        $record = new CustomerRecord;
        $record->name = 'John';
        $record->save();

        $initial_updated_at = $record->updated_at;
        $initial_updated_by = $record->updated_by;

        // When
        $user->logout();
        sleep(1);
        $user->login($second_identity);
        $record->name = 'Bill';
        $record->save();

        // Then
        $this->assertGreaterThan($initial_updated_at, $record->updated_at);
        $this->assertNotEquals($initial_updated_by, $record->updated_by);
        $this->assertEquals($user->id, $record->updated_by);
    }



    /** @return CustomerRecord */
    private function imagineCustomerRecord()
    {
        $faker = \Faker\Factory::create();
        $record = new CustomerRecord();
        $record->name = $faker->name;
        return $record;
    }

    private function assertBetween($before, $value, $after)
    {
        $this->assertLessThanOrEqual($before, $value);
        $this->assertGreaterThanOrEqual($value, $after);
    }

}