<?php

use Sdapi\SdapiClient;
use Sdapi\Endpoints\SdapiTournamentCalendar;

class SdapiTournamentTest extends PHPUnit_Framework_TestCase {

  public function testGetActiveTournaments()
  {

    $client = new SdapiClient('sdapidocumentation');
    $matchQuery = new SdapiTournamentCalendar($client);
    $response = $matchQuery->getAllTournaments();
    $this->assertTrue($response->statusCode == 200);

  }
}
