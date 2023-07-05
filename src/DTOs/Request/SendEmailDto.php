<?php

namespace MailPigeon\DTOs\Request;

class SendEmailDto
{
    /**
     * @var string
     */
    private $recipientName;

    /**
     * @var string
     */
    private $recipientEmail;

    /**
     * @var string
     */
    private $campaignIdentifier;

    /**
     * @var string
     */
    private $languageCode;

    /**
     * @var array
     */
    private $variables;

    /**
     * @param string $recipientName
     * @param string $recipientEmail
     * @param string $campaignIdentifier
     * @param string $languageCode
     * @param array  $variables
     */
    public function __construct($recipientName, $recipientEmail, $campaignIdentifier, $languageCode, array $variables = [])
    {
        $this->recipientName      = $recipientName;
        $this->recipientEmail     = $recipientEmail;
        $this->campaignIdentifier = $campaignIdentifier;
        $this->languageCode       = $languageCode;
        $this->variables          = $variables;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'recipient_name'       => $this->recipientName,
            'recipient_email'      => $this->recipientEmail,
            'campaign_identifier'  => $this->campaignIdentifier,
            'language_code'        => $this->languageCode,
            'variables'            => $this->variables
        ];
    }
}
