<?php

namespace MailPigeon;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use MailPigeon\Exceptions\MailPigeonException;
use MailPigeon\Networking\Response;
use Psr\Http\Message\ResponseInterface;

class MailPigeonClient
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param string $host
     * @param string $apiKey
     */
    public function __construct($host, $apiKey)
    {
        $this->client = new Client([
            'base_uri'    => $host,
            'headers'     => [
                'Authorization' => 'Bearer '.$apiKey,
            ],
            'http_errors' => false
        ]);
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array  $options
     *
     * @return Response
     *
     * @throws MailPigeonException
     */
    public function sendRequest($method, $uri, array $options = [])
    {
        try {
            $response = $this->buildResponse(
                $this->client->request($method, $uri, $options)
            );
        } catch (Exception $exception) {
            throw new MailPigeonException($exception->getMessage());
        }

        $this->checkResponseStatus($response);

        return $response;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return Response
     */
    private function buildResponse(ResponseInterface $response)
    {
        return Response::fromArray(
            json_decode($response->getBody()->getContents(), true)
        );
    }

    /**
     * @param Response $response
     *
     * @return void
     *
     * @throws MailPigeonException
     */
    private function checkResponseStatus(Response $response)
    {
        if (!$response->isSuccess()) {
            throw new MailPigeonException(
                $response->getError()->getMessage(),
                $response->getError()->getCode()
            );
        }
    }
}
