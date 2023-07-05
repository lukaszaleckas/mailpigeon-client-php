<?php

namespace MailPigeon\Networking;

use MailPigeon\Networking\Response\Error;

class Response
{
    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var bool
     */
    private $success;

    /**
     * @var mixed
     */
    private $data;

    /**
     * @var Error|null
     */
    private $error;

    /**
     * @param int        $statusCode
     * @param bool       $success
     * @param mixed      $data
     * @param Error|null $error
     */
    public function __construct($statusCode, $success, $data, $error)
    {
        $this->statusCode = $statusCode;
        $this->success    = $success;
        $this->data       = $data;
        $this->error      = $error;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return Error|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param array $data
     *
     * @return self
     */
    public static function fromArray(array $data)
    {
        return new self(
            $data['status'],
            $data['success'],
            isset($data['data']) ? $data['data'] : null,
            isset($data['error']) ? Error::fromArray($data['error']) : null
        );
    }
}
