<?php

namespace ZhiFang\Tools;

use Carbon\Carbon;
use DateTime;

class Date
{
    /**
     * 生成Carbon对象，不合法数据会返回默认值
     * @param mixed $dateTime
     * @param mixed $default
     * @return Carbon
     * @throws \Exception
     */
    public static function toCarbon($dateTime = null, $default = false)
    {
        if ($dateTime instanceof Carbon) {
            return $dateTime;
        }
        $default = empty($default) ? Carbon::now() : $default;
        if (strtotime($dateTime) > 0) {
            return Carbon::parse($dateTime);
        }
        if (is_numeric($dateTime)) {
            return Carbon::createFromTimestamp($dateTime);
        }
        return $default;
    }


    /**
     * 人性化显示时间差
     * @param DateTime $leftTime
     * @param DateTime $rightTime
     * @param bool $absolute
     * @return string
     */
    public static function timeDiffFormat(DateTime $leftTime, DateTime $rightTime, $absolute = false): string
    {
        $diff = $leftTime->diff($rightTime, $absolute);
        return ($absolute && !$diff->invert ? '-': '')
            . ($diff->y ? $diff->y . '年' : '')
            . ($diff->m ? $diff->m . '月' : '')
            . ($diff->d ? $diff->d . '日' : '')
            . ($diff->h ? $diff->h . '小时' : '')
            . ($diff->i ? $diff->i . '分钟' : '')
            . ($diff->s ? $diff->s . '秒' : '');
    }
}