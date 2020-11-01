<?php

use PHPUnit\Framework\TestCase;
use WsChatApi\Controllers\UsersListController;

class UsersListControllerTest extends TestCase
{
    protected $controllerMock;

    public function setUp(): void
    {
        $this->controllerMock = $this->getMockBuilder(UsersListController::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testGetListReturnArray()
    {
        $this->controllerMock->method('getList')->willReturn([
            'id' => 1,
            'name' => 'John',
            'nickname' => 'johndoe',
            'created_at' => '2010-10-10 10:10:10'
        ]);

        $this->assertIsArray($this->controllerMock->getList());
        $this->assertSame([
            'id' => 1,
            'name' => 'John',
            'nickname' => 'johndoe',
            'created_at' => '2010-10-10 10:10:10'
        ], $this->controllerMock->getList());
    }

    public function tearDown(): void
    {
        $this->controllerMock = null;
    }
}
