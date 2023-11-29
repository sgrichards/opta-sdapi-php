<?php

use Sdapi\SdapiClient;
use Sdapi\Endpoints\SdapiSquads;
use PHPUnit\Framework\TestCase;

class SdapiSquadsTest extends TestCase {

  public function testGetSquad(): void {
    $client = new SdapiClient('1vmmaetzoxkgg1qf6pkpfmku0k');
    $matchQuery = new SdapiSquads($client);
    $response = $matchQuery->getSquadsByTournament('408bfjw6uz5k19zk4am50ykmh');
    $this->assertTrue($response->statusCode == 200);
  }
}
