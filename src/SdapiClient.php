<?php

namespace Sdapi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use function GuzzleHttp\Psr7\stream_for;
use Psr\Http\Message\ResponseInterface;

class SdapiClient {

  private $http_client;

  private $outletAuthToken;

  private $base_url = "https://api.performfeeds.com/soccerdata";

  private $default_args = ['_fmt' => 'json', '_rt' => 'b'];

  /**
   * SdapiClient constructor.
   * @param string $outletAuthToken.
   */
  public function __construct($outletAuthToken)
  {
    $this->outletAuthToken = $outletAuthToken;
    $this->setDefaultClient();
  }

  private function setDefaultClient()
  {
    $this->http_client = new Client();
  }

  /**
   * Sets GuzzleHttp client.
   * @param Client $client
   */
  public function setClient($client)
  {
    $this->http_client = $client;
  }

  /**
   * @param string $endpoint
   * @param string $filter
   * @param array $query
   * @return mixed
   * @internal param $
   */
  public function get($endpoint, $filter = '', array $query = [])
  {
    // merge params with default params.
    $query = array_merge($query, $this->default_args);

    $response = $this->http_client->request('GET', $this->base_url . "/$endpoint" . $filter, [
      'query' => $query
    ]);

    return $this->handleResponse($response);
  }

  /**
   * @param Response $response
   * @return mixed
   */
  private function handleResponse(Response $response){
    $stream = stream_for($response->getBody());
    $data = json_decode($stream->getContents());
    return $data;
  }

}
