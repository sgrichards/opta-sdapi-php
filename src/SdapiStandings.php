<?php

namespace Sdapi;

class SdapiStandings {

  private $client;

  private $feedName = 'standings';

  /**
   * SdapiMatch constructor.
   * @param \Sdapi\SdapiClient $client
   */
  function __construct(SdapiClient $client)
  {
    $this->client = $client;
  }

  /**
   * @param $tournament_calendar_id
   * @return mixed
   */
  function getStandingsByTournament($tournament_calendar_id) {
    return $this->client->get($this->feedName, [], ['tmcl' => $tournament_calendar_id]);
  }

}
