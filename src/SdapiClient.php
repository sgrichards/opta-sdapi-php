<?php

namespace Sdapi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Utils;
use function GuzzleHttp\Psr7\stream_for;
use Psr\Http\Message\ResponseInterface;

class SdapiClient {

  private $http_client;

  private $outletAuthToken;

  private $base_url = "https://api.performfeeds.com/soccerdata";

  private $default_params = [
    '_fmt' => 'json',
    '_rt' => 'b',
  ];

  private $default_options = [
    'connect_timeout' => 30,
  ];

  /**
   * SdapiClient constructor.
   * @param string $outletAuthToken.
   */
  public function __construct($outletAuthToken) {
    $this->outletAuthToken = $outletAuthToken;
    $this->setDefaultClient();
  }

  private function setDefaultClient(): void {
    $this->http_client = new Client();
  }

  /**
   * Set or override default params.
   * @param array $params
   */
  public function setParams(array $params = []): void {
    $this->default_params = array_merge($params, $this->default_params);
  }

  /**
   * Sets GuzzleHttp client.
   * @param Client $client
   */
  public function setClient(Client $client): void {
    $this->http_client = $client;
  }

  /**
   * @param string $endpoint
   * @param array $filters
   * @param array $query
   * @return mixed
   * @internal param $
   */
  public function get(string $endpoint, array $filters = [], array $query = []): mixed {

    // Apply default options.
    $options = $this->default_options;

    // Merge query params with default params.
    $options['query'] = array_merge($query, $this->default_params);

    // Join filters and add preceeding forward slash.
    if (!empty($filters)) {
      $filters = '/' . join('/', $filters);
    }
    else {
      $filters = '';
    }

    // Assemble the query and gather the response.
    $response = $this->http_client->request('GET', $this->base_url . "/$endpoint/{$this->outletAuthToken}" . $filters, $options);

    return $this->handleResponse($response);
  }

  /**
   * @param Response $response
   * @return mixed
   */
  private function handleResponse(Response $response): mixed {
    $stream = Utils::streamFor($response->getBody());
    $data = json_decode($stream->getContents());
    // Append status code
    $data->statusCode = $response->getStatusCode();
    return $data;
  }

}
