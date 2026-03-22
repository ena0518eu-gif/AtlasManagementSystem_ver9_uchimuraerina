<?php
namespace App\Calendars\Admin;

use Carbon\Carbon;
use App\Models\Calendars\ReserveSettings;
use Auth;

class CalendarWeekDay{
  protected $carbon;

  function __construct($date){
    $this->carbon = new Carbon($date);
  }

  function getClassName(){
    return "day-" . strtolower($this->carbon->format("D"));
  }

  function render(){
    return '<p class="day">' . $this->carbon->format("j") . '日</p>';
  }

  function everyDay(){
    return $this->carbon->format("Y-m-d");
  }

  // ===== 元のコード =====
  /*
  function dayPartCounts($ymd){
    $html = [];
    $one_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '1')->first();
    $two_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '2')->first();
    $three_part = ReserveSettings::with('users')->where('setting_reserve', $ymd)->where('setting_part', '3')->first();

    $html[] = '<div class="text-left">';
    if($one_part){
      $html[] = '<p class="day_part m-0 pt-1">1部</p>';
    }
    if($two_part){
      $html[] = '<p class="day_part m-0 pt-1">2部</p>';
    }
    if($three_part){
      $html[] = '<p class="day_part m-0 pt-1">3部</p>';
    }
    $html[] = '</div>';

    return implode("", $html);
  }
  */

  // ===== 修正版（見本通り：1部 0 のリンク形式） =====
  function dayPartCounts($ymd){
    $html = [];

    $html[] = '<div class="part-counts">'; // ← CSSクラスに変更

    for($part = 1; $part <= 3; $part++){
      $reserve = ReserveSettings::with('users')
        ->where('setting_reserve', $ymd)
        ->where('setting_part', $part)
        ->first();

      $count = $reserve ? count($reserve->users) : 0;

      // 部数をクリックすると予約詳細画面へ遷移
      $url = route('calendar.admin.detail', ['date' => $ymd, 'part' => $part]);
      $html[] = '<p>
        <a href="'. $url .'">' . $part . '部</a>
        <span>'. $count .'</span>
      </p>';
    }

    $html[] = '</div>';

    return implode("", $html);
  }

  function onePartFrame($day){
    $one_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '1')->first();
    if($one_part_frame){
      $one_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '1')->first()->limit_users;
    }else{
      $one_part_frame = "20";
    }
    return $one_part_frame;
  }

  function twoPartFrame($day){
    $two_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '2')->first();
    if($two_part_frame){
      $two_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '2')->first()->limit_users;
    }else{
      $two_part_frame = "20";
    }
    return $two_part_frame;
  }

  function threePartFrame($day){
    $three_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '3')->first();
    if($three_part_frame){
      $three_part_frame = ReserveSettings::where('setting_reserve', $day)->where('setting_part', '3')->first()->limit_users;
    }else{
      $three_part_frame = "20";
    }
    return $three_part_frame;
  }

  function dayNumberAdjustment(){
    $html = [];
    $html[] = '<div class="adjust-area">';
    $html[] = '<p class="d-flex m-0 p-0">1部<input class="w-25" style="height:20px;" name="1" type="text" form="reserveSetting"></p>';
    $html[] = '<p class="d-flex m-0 p-0">2部<input class="w-25" style="height:20px;" name="2" type="text" form="reserveSetting"></p>';
    $html[] = '<p class="d-flex m-0 p-0">3部<input class="w-25" style="height:20px;" name="3" type="text" form="reserveSetting"></p>';
    $html[] = '</div>';
    return implode('', $html);
  }
}
