<?php

namespace Sdapi\Endpoints;

use Sdapi\SdapiEndpoint;

class SdapiMatch extends SdapiEndpoint {

  protected $feedName = 'match';

  /**
   * @param $match_id
   * @return mixed
   */
  function getMatch($match_id, $live = FALSE) {
    $live  = $live ? ['live' => 'yes'] : [];
    return $this->get([$match_id], $live);
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
    $this->setParams(['_pgSz' => self::SDAPI_PAGE_SIZE]);
    return $this->get([], ['tmcl' => $tournament_calendar_id]);
  }

  /**
   * @param $competition_id
   * @param $contestant_id
   * @return mixed
   */
  function getMatchesByCompetitionAndContestant($competition_id, $contestant_id) {
    $this->setParams(['_pgSz' => self::SDAPI_PAGE_SIZE]);
    return $this->get([], ['comp' => $competition_id, 'ctst' => $contestant_id]);
  }

  /**
   * @param $tournament_calendar_id
   * @param $contestant_id
   * @return mixed
   */
  function getMatchesByTournamentAndContestant($tournament_calendar_id, $contestant_id) {
    $this->setParams(['_pgSz' => self::SDAPI_PAGE_SIZE]);
    return $this->get([], ['tmcl' => $tournament_calendar_id, 'ctst' => $contestant_id]);
  }

  /**
   * @param $competition_id
   * @param \DatePeriod $date_range
   * @return mixed
   */
  function getMatchesByCompetitionAndDateRange($competition_id, \DatePeriod $date_range) {

    $format = \DateTime::ISO8601;

    $start_date = $date_range->getStartDate()->format($format);
    $end_date = $date_range->getEndDate()->format($format);
    $date_range_string = '[' . $start_date . ' TO ' . $end_date . ']';

    return $this->get([], ['mt.mDt' => $date_range_string, 'comp' => $competition_id]);
  }

}
