<?php

namespace Sdapi\Endpoints;

use Sdapi\SdapiEndpoint;

class SdapiTournamentCalendar extends SdapiEndpoint {

  protected $feedName = 'tournamentcalendar';

  /**
   * @param array $filters
   * @return mixed
   */
  function getAllTournaments(array $filters = []) {
    return $this->get($filters);
  }

  /**
   * @param string $competition_id
   * @param array $filters
   * @return mixed
   */
  function getTournamentByCompetition($competition_id, array $filters = []) {
    return $this->get($filters, ['comp' => $competition_id]);
  }

}
