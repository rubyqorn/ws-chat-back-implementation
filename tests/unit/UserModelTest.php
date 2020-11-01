<?php

use PHPUnit\Framework\TestCase;
use WsChatApi\Models\User;

class UserModelTest extends TestCase
{
    protected $userModelMock;

    public function setUp(): void
    {
        $this->userModelMock = $this->getMockBuilder(User::class)->getMock();
    }

    public function testQueryAllUsersReturnArrayAndHaveSameSize()
    {
        $this->userModelMock->method('queryAllUsers')->willReturn([
            [
                'id' => 1,
                'name' => 'John',
                'nickname' => 'johndoe',
                'created_at' => '2010-10-10 10:10:10'
            ],
            [
                'id' => 2,
                'name' => 'Mark',
                'nickname' => 'markdoe',
                'created_at' => '2011-11-11 11:11:11'
            ]
        ]);

        $this->assertIsArray($this->userModelMock->queryAllUsers());
        $this->assertSame(count($this->userModelMock->queryAllUsers()), 2);
    }

    public function tearDown(): void
    {
        $this->userModelMock = null;
    }
}
