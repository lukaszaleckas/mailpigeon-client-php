<?php

namespace MailPigeon\Tests\Integration;

use MailPigeon\DTOs\Request\SendEmailDto;
use MailPigeon\Exceptions\MailPigeonException;

class EmailSendTest extends IntegrationTestCase
{
    /**
     * @return void
     *
     * @throws MailPigeonException
     */
    public function testValidationExceptionIsThrown()
    {
        $this->expectException(MailPigeonException::class);
        $this->expectExceptionCode(4002);

        $this->api->sendEmail(
            new SendEmailDto(
                'John Doe',
                'jon.doe@gmail.com',
                '!!!',
                'en'
            )
        );
    }

    /**
     * @return void
     *
     * @throws MailPigeonException
     */
    public function testCanSendEmail()
    {
        $this->api->sendEmail(
            $this->mockSendEmailDto()
        );
    }
}
