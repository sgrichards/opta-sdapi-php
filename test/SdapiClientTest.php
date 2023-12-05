<?php

use Sdapi\SdapiClient;
use PHPUnit\Framework\TestCase;

class SdapiClientTest extends TestCase {

  public function testBasicClient(): void {
    $client = new SdapiClient('1vmmaetzoxkgg1qf6pkpfmku0k');
    $response = $client->get('match', ['bsu6pjne1eqz2hs8r3685vbhl']);
    $this->assertTrue($response->statusCode == 200);
  }
}