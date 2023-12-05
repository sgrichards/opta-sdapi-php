<?php

use Sdapi\SdapiClient;
use Sdapi\Endpoints\SdapiMatch;
use PHPUnit\Framework\TestCase;

class SdapiMatchTest extends TestCase {

  public function testGetMatch(): void {
    $client = new SdapiClient('1vmmaetzoxkgg1qf6pkpfmku0k');
    $matchQuery = new SdapiMatch($client);
    $response = $matchQuery->getMatch('bsu6pjne1eqz2hs8r3685vbhl');
    $this->assertTrue($response->statusCode == 200);
  }

}