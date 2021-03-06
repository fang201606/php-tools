<?php

namespace ZhiFang\Tools\Tests;

use PHPUnit\Framework\TestCase;
use ZhiFang\Tools\Node;
use ZhiFang\Tools\SnowFlake;

class SnowFlakeTest extends TestCase
{
    public function testSnowFlake()
    {
        $node = null;
        $id   = 0;
        $this->assertNull($node);
        for ($i = 0; $i < 50000; $i++) {
            $id = SnowFlake::test(0, 1);
        }
        /** @var Node $node */
        $node = SnowFlake::analysis($id);
        $this->assertInstanceOf(Node::class, $node);
        $this->assertSame(0, $node->dataCenterID);
        $this->assertSame(1, $node->workerID);

        for ($i = 0; $i < 50000; $i++) {
            $id   = SnowFlake::next(0, 1);
            $node = SnowFlake::analysis($id);
        }
        $this->assertInstanceOf(Node::class, $node);
        $this->assertSame(0, $node->dataCenterID);
        $this->assertSame(1, $node->workerID);
    }
}