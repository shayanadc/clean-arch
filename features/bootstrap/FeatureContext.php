<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends \Tests\TestCase implements Context
{
    private $endpoint;
    private $request;
    private $response;
    use \Illuminate\Foundation\Testing\DatabaseMigrations;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        putenv("APP_ENV=testing");
        putenv("BCRYPT_ROUNDS=4");
        putenv("CACHE_DRIVER=array");
        putenv("DB_CONNECTION=sqlite_testing");
        putenv("DB_DATABASE=:memory:");
        putenv("MAIL_DRIVER=array");
        putenv("QUEUE_CONNECTION=sync");
        putenv("SESSION_DRIVER=array");
        parent::setUp();
    }

    /**
     * @Given I am a member
     */
    public function iAmAMember()
    {
    }

    /**
     * @When fill the form with:
     */
    public function fillTheFormWith(PyStringNode $string)
    {
        $this->request = json_decode($string->getRaw(),true);
    }

    /**
     * @Then I should receive ok
     */
    public function iShouldReceiveOk()
    {
        $this->response->assertStatus(200);
    }

    /**
     * @Then receive JSON response:
     */
    public function receiveJsonResponse(PyStringNode $string)
    {
        $jsonResp = $string->getRaw();
        $this->assertJsonStringEqualsJsonString($jsonResp, $this->response->getContent());
    }

    /**
     * @When I open endpoint :arg1
     */
    public function iOpenEndpoint($arg1)
    {
        $this->endpoint = $arg1;
    }

    /**
     * @When send :arg1 request
     */
    public function sendRequest($arg1)
    {
        if($arg1 == 'POST') $this->response = $this->postJson($this->endpoint,$this->request);
    }
}
