<?php

use Sdapi\SdapiClient;
use Sdapi\Endpoints\SdapiTournamentCalendar;
use PHPUnit\Framework\TestCase;

class SdapiTournamentTest extends TestCase {

  public function testGetActiveTournaments(): void {
    $client = new SdapiClient('1vmmaetzoxkgg1qf6pkpfmku0k');
    $matchQuery = new SdapiTournamentCalendar($client);
    $response = $matchQuery->getAllTournaments();
    $this->assertTrue($response->statusCode == 200);
  }
}
