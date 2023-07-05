<?php

namespace MailPigeon\Networking\Response;

class Error
{
    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @param int    $code
     * @param string $message
     */
    public function __construct($code, $message)
    {
        $this->code    = $code;
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param array $data
     *
     * @return self
     */
    public static function fromArray(array $data)
    {
        return new self(
            $data['code'],
            $data['message']
        );
    }
}
