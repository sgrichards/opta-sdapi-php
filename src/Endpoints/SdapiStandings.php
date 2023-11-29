<?php

namespace Sdapi\Endpoints;

use Sdapi\SdapiEndpoint;

class SdapiStandings extends SdapiEndpoint {

  protected $feedName = 'standings';

  /**
   * @param string $tournament_calendar_id
   * @return mixed
   */
  function getStandingsByTournament(string $tournament_calendar_id): mixed {
    return $this->get([], ['tmcl' => $tournament_calendar_id]);
  }

}
