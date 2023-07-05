<?php

namespace MailPigeon;

use MailPigeon\DTOs\Request\SendEmailDto;
use MailPigeon\Exceptions\MailPigeonException;

class MailPigeonApi
{
    /**
     * @var MailPigeonClient
     */
    private $client;

    /**
     * @param MailPigeonClient $client
     */
    public function __construct(MailPigeonClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param SendEmailDto $dto
     *
     * @return void
     *
     * @throws MailPigeonException
     */
    public function sendEmail(SendEmailDto $dto)
    {
        $this->client->sendRequest(
            'POST',
            '/api/v1/email/send',
            [
                'form_params' => $dto->toArray()
            ]
        );
    }
}
