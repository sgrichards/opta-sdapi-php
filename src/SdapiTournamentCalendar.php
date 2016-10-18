<?php

namespace Sdapi;

class SdapiTournamentCalendar {

  private $client;

  private $feedName = 'tournamentcalendar';

  /**
   * SdapiTournamentCalendar constructor.
   * @param \Sdapi\SdapiClient $client
   */
  function __construct(SdapiClient $client)
  {
    $this->client = $client;
  }

  /**
   * @param array $filters
   * @return mixed
   */
  function getAllTournaments(array $filters = []) {
    return $this->client->get($this->feedName, $filters);
  }

  /**
   * @param string $competition_id
   * @param array $filters
   * @return mixed
   */
  function getTournamentByCompetition($competition_id, array $filters = []) {
    return $this->client->get($this->feedName, $filters, ['comp' => $competition_id]);
  }

}
