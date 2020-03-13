<?php
/**
 *  获取本月第一天和最后一天
 * @param $date
 * @return array
 */
function getMonth($date)
{
    $firstday = date("Y-m-01", strtotime($date));
    $lastday = date("Y-m-d", strtotime("$firstday +1 month -1 day"));
    return array($firstday, $lastday);
}

/**
 *  获取上个月第一天和最后一天
 * @param $date
 * @return array
 */
function getlastMonthDays($date)
{
    $timestamp = strtotime($date);
    $firstday = date('Y-m-01', strtotime(date('Y', $timestamp) . '-' . (date('m', $timestamp) - 1) . '-01'));
    $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
    return array($firstday, $lastday);
}

/**
 *  获取下个月第一天和最后一天
 * @param $date
 * @return array
 */
function getNextMonthDays($date)
{
    $timestamp = strtotime($date);
    $arr = getdate($timestamp);
    if ($arr['mon'] == 12) {
        $year = $arr['year'] + 1;
        $month = $arr['mon'] - 11;
        $firstday = $year . '-0' . $month . '-01';
        $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
    } else {
        $firstday = date('Y-m-01', strtotime(date('Y', $timestamp) . '-' . (date('m', $timestamp) + 1) . '-01'));
        $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
    }
    return array($firstday, $lastday);
}

/**
 * 获取一周的时间戳or时间字符串
 * @param $is_str (是否显示一周的时间字符串)
 * @return array
 */
function getWeekTime($is_str = false)
{
    // 获取一周中每天的时间戳
    $time = strtotime(date('Y-m-d'));
    $week = date('w');
    $everyDateStart = [];
    for ($i = 1; $i <= 7; $i++) {
        if ($i < $week) {
            $everyDateStart[$i] = $time - ($week - $i) * 86400;
        }
        if ($week == $i) {
            $everyDateStart[$i] = $time;
        }
        if ($i > $week) {
            $everyDateStart[$i] = $time + ($i - $week) * 86400;
        }
    }
    if ($is_str) {
        foreach ($everyDateStart as &$item) {
            $item = date('Y-m-d', $item);
        }
    }
    return $everyDateStart;
}

/**
 * 计算年龄
 * @param $time 出生日对应的时间戳
 * @return bool|int|string
 */
function getAge($time)
{
    $year_diff = date('Y') - date('Y', $time);
    $mon_diff = date('m') - date('m', $time);
    if ($year_diff == 0) {
        return 0;
    } else {
        if ($mon_diff >= 0) {
            return $year_diff;
        } else {
            return $year_diff - 1;
        }
    }
}