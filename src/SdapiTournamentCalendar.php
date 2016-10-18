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
   * @param bool $active
   * @return mixed
   */
  function getAllTournaments($active = TRUE) {
    $filter = $active ? ['active'] : [];
    return $this->client->get($this->feedName, $filter);
  }

  /**
   * @param string $competition_id
   * @param bool $active
   * @return mixed
   */
  function getTournamentByCompetition($competition_id, $active = TRUE) {
    $filter = $active ? ['active'] : [];
    return $this->client->get($this->feedName, $filter, ['comp' => $competition_id]);
  }

}
