<?php

namespace MailPigeon\Tests\Integration;

use Dotenv\Dotenv;
use MailPigeon\DTOs\Request\SendEmailDto;
use MailPigeon\MailPigeonApi;
use MailPigeon\MailPigeonClient;
use PHPUnit_Framework_TestCase;

abstract class IntegrationTestCase extends PHPUnit_Framework_TestCase
{
    /**
     * @var MailPigeonApi
     */
    protected $api;

    /**
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->loadEnv();

        $this->api = new MailPigeonApi(
            new MailPigeonClient($_ENV['API_KEY'])
        );
    }

    /**
     * @return SendEmailDto
     */
    protected function mockSendEmailDto()
    {
        return new SendEmailDto(
            'test',
            $_ENV['TEST_RECIPIENT'],
            $_ENV['TEST_CAMPAIGN_IDENTIFIER'],
            $_ENV['TEST_TEMPLATE_LANGUAGE']
        );
    }

    /**
     * @return void
     */
    private function loadEnv()
    {
        $dotenv = Dotenv::createMutable(__DIR__ . '/../../');

        $dotenv->load();
    }
}
