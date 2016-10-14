<?php

use Sdapi\SdapiClient;
use GuzzleHttp\Exception\ClientException;

class SdapiClientTest extends PHPUnit_Framework_TestCase {

  public function testBasicClient()
  {

    $client = new SdapiClient('sdapidocumentation');
    $response = $client->get('match', ['bsu6pjne1eqz2hs8r3685vbhl']);
    $this->assertTrue($response->statusCode == 200);

  }
}