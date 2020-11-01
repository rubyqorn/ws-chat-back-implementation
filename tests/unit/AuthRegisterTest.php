<?php

use PHPUnit\Framework\TestCase;
use WsChatApi\Auth\Register;
use WsChatApi\Models\User;

class AuthRegister extends TestCase
{
    protected $userModelMock;

    public function setUp(): void
    {
        $this->userModelMock = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testMakeMethodReturnRegisteredStatus()
    {
        $this->userModelMock->method('checkUserExistence')
            ->willReturn(true);
        $this->userModelMock->method('registerNewUser')
            ->willReturn(true);

        $register = new Register();
        $this->assertTrue($register->make($this->userModelMock, 'John', 'johndoe'));
    }

    public function tearDown(): void
    {
        $this->userModelMock = null;
    }
}
