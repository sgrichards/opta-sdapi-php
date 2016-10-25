<?php

namespace Sdapi;

class SdapiMatch {

  private $client;

  private $feedName = 'match';

  /**
   * SdapiMatch constructor.
   * @param \Sdapi\SdapiClient $client
   */
  function __construct(SdapiClient $client)
  {
    $this->client = $client;
  }

  /**
   * @param $match_id
   * @return mixed
   */
  function getMatch($match_id, $live = FALSE) {
    $live  = $live ? ['live' => 'yes'] : [];
    return $this->client->get($this->feedName, [$match_id], $live);
  }

  /**
   * @param $match_id
   * @return mixed
   */
  function getLiveMatch($match_id) {
    return $this->getMatch($match_id, TRUE);
  }

  /**
   * @param $tournament_calendar_id
   * @return mixed
   */
  function getMatchesByTournament($tournament_calendar_id) {
    return $this->client->get($this->feedName, [], ['tmcl' => $tournament_calendar_id]);
  }

  /**
   * @param $competition_id
   * @param $contestant_id
   * @return mixed
   */
  function getMatchesByCompetitionAndContestant($competition_id, $contestant_id) {
    return $this->client->get($this->feedName, [], ['comp' => $competition_id, 'ctst' => $contestant_id]);
  }

  /**
   * @param $tournament_calendar_id
   * @param $contestant_id
   * @return mixed
   */
  function getMatchesByTournamentAndContestant($tournament_calendar_id, $contestant_id) {
    return $this->client->get($this->feedName, [], ['tmcl' => $tournament_calendar_id, 'ctst' => $contestant_id]);
  }

}
