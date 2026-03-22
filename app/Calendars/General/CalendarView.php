<?php
namespace App\Calendars\General;

use Carbon\Carbon;
use Auth;

class CalendarView{

  private $carbon;
  function __construct($date){
    $this->carbon = new Carbon($date);
  }

  public function getTitle(){
    return $this->carbon->format('Y年n月');
  }

  function render(){
    $html = [];
    $html[] = '<div class="calendar text-center">';
    $html[] = '<table class="table">';
    $html[] = '<thead>';
    $html[] = '<tr>';
    $html[] = '<th>月</th>';
    $html[] = '<th>火</th>';
    $html[] = '<th>水</th>';
    $html[] = '<th>木</th>';
    $html[] = '<th>金</th>';
    $html[] = '<th class="day-sat">土</th>'; // ← 土曜ヘッダー青
    $html[] = '<th class="day-sun">日</th>'; // ← 日曜ヘッダー赤
    $html[] = '</tr>';
    $html[] = '</thead>';
    $html[] = '<tbody>';
    $weeks = $this->getWeeks();
    foreach($weeks as $week){
      $html[] = '<tr class="'.$week->getClassName().'">';

      $days = $week->getDays();
      foreach($days as $day){
        $startDay = $this->carbon->copy()->format("Y-m-01");
        $toDay = $this->carbon->copy()->format("Y-m-d");

        if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){
          // 過去日 → past-day + 曜日クラス両方付与
          $html[] = '<td class="calendar-td past-day '.$day->getClassName().'">';
        }else{
          $html[] = '<td class="calendar-td '.$day->getClassName().'">';
        }
        $html[] = $day->render();

        if(in_array($day->everyDay(), $day->authReserveDay())){
          $reserveData = $day->authReserveDate($day->everyDay())->first();
          $reservePart = $reserveData->setting_part;
          $reserveDate = $reserveData->setting_reserve;
          if($reservePart == 1){
            $reservePartLabel = "リモ1部";
          }else if($reservePart == 2){
            $reservePartLabel = "リモ2部";
          }else if($reservePart == 3){
            $reservePartLabel = "リモ3部";
          }
          if($startDay <= $day->everyDay() && $toDay >= $day->everyDay()){
            // 過去の予約済み日は参加した部を表示
            $html[] = '<p class="m-auto p-0 w-75" style="font-size:12px">' . $reservePartLabel . '参加</p>';
            $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
          }else{
            // 🔥 キャンセルボタン → モーダル起動
            $html[] = '<button type="button" class="btn btn-danger p-0 w-75 btn-cancel-reserve" style="font-size:12px"
              data-date="'. $reserveDate .'"
              data-part="'. $reservePartLabel .'"
              data-id="'. $reserveData->id .'">'. $reservePartLabel .'</button>';
            $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
          }
        }else{
          $html[] = $day->selectPart($day->everyDay());
        }
        $html[] = $day->getDate();
        $html[] = '</td>';
      }
      $html[] = '</tr>';
    }
    $html[] = '</tbody>';
    $html[] = '</table>';
    $html[] = '</div>';

    // ❌ form削除（ここが今回の本丸）
    // $html[] = '<form action="/reserve/calendar" method="post" id="reserveParts">'.csrf_field().'</form>';
    // $html[] = '<form action="/delete/calendar" method="post" id="deleteParts">'.csrf_field().'</form>';

    return implode('', $html);
  }

  protected function getWeeks(){
    $weeks = [];
    $firstDay = $this->carbon->copy()->firstOfMonth();
    $lastDay = $this->carbon->copy()->lastOfMonth();
    $week = new CalendarWeek($firstDay->copy());
    $weeks[] = $week;
    $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
    while($tmpDay->lte($lastDay)){
      $week = new CalendarWeek($tmpDay, count($weeks));
      $weeks[] = $week;
      $tmpDay->addDay(7);
    }
    return $weeks;
  }
}
