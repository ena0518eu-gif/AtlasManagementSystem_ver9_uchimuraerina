<?php
namespace App\Calendars\Admin;

use Carbon\Carbon;

class CalendarWeek {

  protected $carbon;
  protected $startDay;
  protected $week;

  function __construct($date, $week = 0){
    $this->carbon = new Carbon($date);
    $this->week = $week;
    $this->startDay = $this->carbon->copy()->startOfMonth()->addWeeks($week)->startOfWeek();
  }

  function getClassName(){
    return "week-" . $this->week;
  }

  function getDays(){
    $days = [];

    for($day = 0; $day < 7; $day++){
      $tmpDay = $this->startDay->copy()->addDays($day);

      // ← 月外の日はBlankDayに変更
      if($tmpDay->month != $this->carbon->month){
        $days[] = new CalendarWeekBlankDay($tmpDay);
      }else{
        $days[] = new CalendarWeekDay($tmpDay);
      }
    }

    return $days;
  }
}
