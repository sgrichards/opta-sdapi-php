<?php

use Sdapi\SdapiClient;
use Sdapi\Endpoints\SdapiStandings;
use PHPUnit\Framework\TestCase;

class SdapiStandingsTest extends TestCase {

  public function testGetStandingsByTournament(): void {
    $client = new SdapiClient('1vmmaetzoxkgg1qf6pkpfmku0k');
    $matchQuery = new SdapiStandings($client);
    $response = $matchQuery->getStandingsByTournament('408bfjw6uz5k19zk4am50ykmh');
    $this->assertTrue($response->statusCode == 200);
  }

}
