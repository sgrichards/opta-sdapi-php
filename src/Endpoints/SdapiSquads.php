<?php

namespace Sdapi\Endpoints;

use Sdapi\SdapiEndpoint;

class SdapiSquads extends SdapiEndpoint {

  protected string $feedName = 'squads';

  /**
   * @param string $contestant_id
   * @param bool $detailed
   * @return mixed
   */
  function getSquad(string $contestant_id, bool $detailed = FALSE): mixed {

    $query = $detailed ? ['detailed' => 'yes'] : [];
    $query['ctst'] = $contestant_id;

    return $this->get([], $query);
  }

  /**
   * @param string $contestant_id
   * @return mixed
   */
  function getDetailedSquad(string $contestant_id): mixed {
    return $this->getSquad($contestant_id, TRUE);
  }

  /**
   * @param string $tournament_calendar_id
   * @param string $contestant_id
   * @param $detailed
   * @return mixed
   */
  function getSquadsByTournament(string $tournament_calendar_id, string $contestant_id = '', $detailed = FALSE): mixed {

    $this->setParams(['_pgSz'=> self::SDAPI_PAGE_SIZE]);

    $query = [];
    !empty($contestant_id) ? $query['ctst'] = $contestant_id : NULL;

    $query = $detailed ? ['detailed' => 'yes'] : [];
    $query['tmcl'] = $tournament_calendar_id;

    return $this->get([], $query);
  }

}
