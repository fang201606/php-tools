<?php

namespace ZhiFang\Tools\Tests;

use PHPUnit\Framework\TestCase;
use ZhiFang\Tools\Date;

class DateTest extends TestCase
{
    public function testDate()
    {
        $tOne = time();
        $tTwo = $tOne + (86400 * 29 - 5);
        $tThree = '2019-10-15';
        $dateOne = date('Y-m-d', $tOne);
        $dateTwo = date('Y-m-d', $tTwo);
        $carbonOne = Date::toCarbon($tOne);
        $carbonTwo = Date::toCarbon($tTwo);
        $carbonThree = Date::toCarbon($tThree);
        $this->assertSame($dateOne, $carbonOne->toDateString());
        $this->assertSame($dateTwo, $carbonTwo->toDateString());
        $this->assertSame('28日23小时59分钟55秒', Date::timeDiffFormat(Date::toCarbon($carbonOne), $carbonTwo));
        $this->assertSame('-28日23小时59分钟55秒', Date::timeDiffFormat($carbonTwo, $carbonOne, true));
        $this->assertSame(1, Date::toCarbon('asdldkas;[]padsads', 1));
    }
}