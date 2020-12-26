<?php


class ServicesListApiTest extends \Codeception\TestCase\Test
{
   /**
    * @var \ApiTester
    */
    protected $tester;

    /** @test */
    public function ReturnsValidJson()
    {
        $expectedData = [];
        $expectedData[0] = $this->registerService();
        $expectedData[1] = $this->registerService();

        $this->tester->sendGET('/api/services/json');

        $response = $this->tester->grabResponse();
        $responseData = \yii\helpers\Json::decode($response);

        $this->assertInternalType('array', $responseData);
        $this->assertEquals($expectedData[0], $responseData[0]);
        $this->assertEquals($expectedData[1], $responseData[1]);
    }

    /** @test */
    public function ReturnsValidYaml()
    {
        $expectedData = [];
        $expectedData[0] = $this->registerService();
        $expectedData[1] = $this->registerService();

        $this->tester->sendGET('/api/services/yaml');

        $response = $this->tester->grabResponse();
        $responseData = \Symfony\Component\Yaml\Yaml::parse($response);

        $this->assertInternalType('array', $responseData);
        $this->assertEquals($expectedData[0], $responseData[0]);
        $this->assertEquals($expectedData[1], $responseData[1]);
    }

    /** @test */
    public function HasJsonEndpoint()
    {
        $this->tester->sendGET('/api/services/json');
        $response = $this->tester->grabResponse();

        $this->tester->canSeeResponseCodeIs(200); //1
        $this->assertNotEquals('', $response); //2
    }

    /** @test */
    public function HasYamlEndpoint()
    {
        $this->tester->sendGET('/api/services/yaml');
        $response = $this->tester->grabResponse();

        $this->tester->canSeeResponseCodeIs(200); //1
        $this->assertNotEquals('', $response); //2
    }

    private function registerService()
    {
        $service = $this->imagineService();

        $service->save();

        return $service->attributes;
    }

    private function imagineService()
    {
        $faker = \Faker\Factory::create();

        $service = new \app\models\service\ServiceRecord();
        $service->name = $faker->sentence($words = 3);
        $service->hourly_rate = $faker->randomNumber($digits = 2);

        return $service;
    }

}