<?php

use Sdapi\SdapiClient;
use Sdapi\Endpoints\SdapiMatch;

class SdapiMatchTest extends PHPUnit_Framework_TestCase {

  public function testGetMatch()
  {

    $client = new SdapiClient('sdapidocumentation');
    $matchQuery = new SdapiMatch($client);
    $response = $matchQuery->getMatch('bsu6pjne1eqz2hs8r3685vbhl');
    $this->assertTrue($response->statusCode == 200);

  }

  public function testGetMatchesByContestantAndDateRange() {
    $client = new SdapiClient('sdapidocumentation');
    $matchQuery = new SdapiMatch($client);

  }
}