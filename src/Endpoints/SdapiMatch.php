<?php

namespace Sdapi\Endpoints;

use Sdapi\SdapiEndpoint;

class SdapiMatch extends SdapiEndpoint {

  protected $feedName = 'match';

  protected $date_format = 'Y-m-d\TH:i:s\Z';

  /**
   * @param $match_id
   * @return mixed
   */
  function getMatch(string $match_id, bool $live = FALSE): mixed {
    $live  = $live ? ['live' => 'yes'] : [];
    return $this->get([$match_id], $live);
  }

  /**
   * @param $match_id
   * @return mixed
   */
  function getLiveMatch(string $match_id): mixed {
    return $this->getMatch($match_id, TRUE);
  }

  /**
   * @param $tournament_calendar_id
   * @return mixed
   */
  function getMatchesByTournament(string $tournament_calendar_id): mixed {
    $this->setParams(['_pgSz' => self::SDAPI_PAGE_SIZE]);
    return $this->get([], ['tmcl' => $tournament_calendar_id]);
  }

  /**
   * @param $competition_id
   * @param $contestant_id
   * @return mixed
   */
  function getMatchesByCompetitionAndContestant(string $competition_id, string $contestant_id): mixed {
    $this->setParams(['_pgSz' => self::SDAPI_PAGE_SIZE]);
    return $this->get([], ['comp' => $competition_id, 'ctst' => $contestant_id]);
  }

  /**
   * @param $tournament_calendar_id
   * @param $contestant_id
   * @return mixed
   */
  function getMatchesByTournamentAndContestant(string $tournament_calendar_id, string $contestant_id): mixed {
    $this->setParams(['_pgSz' => self::SDAPI_PAGE_SIZE]);
    return $this->get([], ['tmcl' => $tournament_calendar_id, 'ctst' => $contestant_id]);
  }

  /**
   * @param string $competition_id
   * @param \DateTimeInterface $start_date
   * @param \DateTimeInterface $end_date
   * @return mixed
   */
  function getMatchesByCompetitionAndDateRange(string $competition_id, \DateTimeInterface $start_date, \DateTimeInterface $end_date): mixed {

    $date_range_string = '[' . $start_date->format($this->date_format) . ' TO ' . $end_date->format($this->date_format) . ']';

    return $this->get([], ['mt.mDt' => $date_range_string, 'comp' => $competition_id]);
  }

}
