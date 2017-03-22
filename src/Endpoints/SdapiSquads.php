<?php

namespace Sdapi\Endpoints;

use Sdapi\SdapiEndpoint;

class SdapiSquads extends SdapiEndpoint {

  protected $feedName = 'squads';

  /**
   * @param $contestant_id
   * @return mixed
   */
  function getSquad($contestant_id, $detailed = FALSE) {

    $query = $detailed ? ['detailed' => 'yes'] : [];
    $query['ctst'] = $contestant_id;

    return $this->get([], $query);
  }

  /**
   * @param $contestant_id
   * @return mixed
   */
  function getDetailedSquad($contestant_id) {
    return $this->getSquad($contestant_id, TRUE);
  }

  /**
   * @param $tournament_calendar_id
   * @param $contestant_id
   * @return mixed
   */
  function getSquadsByTournament($tournament_calendar_id, $contestant_id = '', $detailed = FALSE) {

    $this->setParams(['_pgSz'=> self::SDAPI_PAGE_SIZE]);

    $query = [];  
    !empty($contestant_id) ? $query['ctst'] = $contestant_id : NULL;

    $query = $detailed ? ['detailed' => 'yes'] : [];
    $query['tmcl'] = $tournament_calendar_id;

    return $this->get([], $query);
  }

}
