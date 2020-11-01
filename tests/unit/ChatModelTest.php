<?php

use PHPUnit\Framework\TestCase;
use WsChatApi\Models\Chat;

class ChatModelTest extends TestCase
{
    protected $chatModelMock;

    public function setUp(): void
    {
        $this->chatModelMock = $this->getMockBuilder(Chat::class)->getMock();
    }

    public function testQueryAllMessagesReturnArrayAndHaveSameSize()
    {
        $this->chatModelMock->method('queryAllMessages')->willReturn([
            [
                'nickname' => 'johndoe',
                'id' => 1,
                'message' => 'Hello world',
                'created_at' => '2010-10-10 10:10:10'
            ],
            [
                'nickname' => 'doejohn',
                'id' => 2,
                'message' => 'Hello there',
                'created_at' => '2010-11-11 11:11:11'
            ]
        ]);

        $this->assertIsArray($this->chatModelMock->queryAllMessages());
        $this->assertSame(count($this->chatModelMock->queryAllMessages()), 2);
    }

    public function tearDown(): void
    {
        $this->chatModelMock = null;
    }
}
