<?php

namespace Sdapi;

class SdapiSquads {

  private $client;

  private $feedName = 'squads';

  /**
   * SdapiMatch constructor.
   * @param \Sdapi\SdapiClient $client
   */
  function __construct(SdapiClient $client)
  {
    $this->client = $client;
  }

  /**
   * @param $contestant_id
   * @return mixed
   */
  function getSquad($contestant_id, $detailed = FALSE) {

    $query = $detailed ? ['detailed' => 'yes'] : [];
    $query['ctst'] = $contestant_id;

    return $this->client->get($this->feedName, [], $query);
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
   * @return mixed
   */
  function getSquadsByTournament($tournament_calendar_id) {
    return $this->client->get($this->feedName, [], ['tmcl' => $tournament_calendar_id]);
  }

}
