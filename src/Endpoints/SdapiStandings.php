<?php

namespace Sdapi\Endpoints;

use Sdapi\SdapiEndpoint;

class SdapiStandings extends SdapiEndpoint {

  protected $feedName = 'standings';

  /**
   * @param $tournament_calendar_id
   * @return mixed
   */
  function getStandingsByTournament($tournament_calendar_id) {
    return $this->get([], ['tmcl' => $tournament_calendar_id]);
  }

}
