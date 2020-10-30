<?php

use PHPUnit\Framework\TestCase;
use WsChatApi\Libraries\Database\MockedDatabaseConnection;
use WsChatApi\Libraries\Database\Query;

class QueryTest extends TestCase
{
    protected $reflection;
    protected $values;
    protected $query;
    protected $sql;

    public function setUp(): void
    {
        $this->reflection = new ReflectionClass(Query::class);
        $this->sql = $this->reflection->getProperty('sql');
        $this->sql->setAccessible(true);
        $this->values = $this->reflection->getProperty('values');
        $this->values->setAccessible(true);

        $this->query = new Query(
            new MockedDatabaseConnection,
            'users'
        );
    }

    public function testSelectAllContainsCorrectSQLAndReturnInstance()
    {
        $query = $this->query->selectAll();
        $this->assertInstanceOf(Query::class, $query);
        $this->assertSame("SELECT * FROM users", $this->sql->getValue($this->query));
    }

    public function testSelectRowsContainsCorrectSQLAndReturnInstance()
    {
        $query = $this->query->selectRows('name, email, password');
        $this->assertInstanceOf(Query::class, $query);
        $this->assertSame(
            "SELECT name, email, password FROM users",
            $this->sql->getValue($query)
        );
    }

    public function testInsertContainCorrectSQLAndValuesAndReturnInstance()
    {
        $query = $this->query->insert(
            'name, email, password', ['John', 'john@email.com', '123456']
        );

        $this->assertInstanceOf(Query::class, $query);
        $this->assertSame(
            "INSERT INTO users (name, email, password) VALUES (?,?,?)",
            $this->sql->getValue($query)
        );
        $this->assertSame(
            ['John', 'john@email.com', '123456'],
            $this->values->getValue($query)
        );
    }

    public function testUpdateContainCorrectSQLAndValuesAndReturnInstance()
    {
        $query = $this->query->update(
            'name = ?, email = ?, password = ?', ['John', 'john@email.com', '123456']
        );

        $this->assertInstanceOf(Query::class, $query);
        $this->assertSame(
            "UPDATE users SET name = ?, email = ?, password = ?",
            $this->sql->getValue($query)
        );
        $this->assertSame(
            ['John', 'john@email.com', '123456'],
            $this->values->getValue($query)
        );
    }

    public function testDeleteContainCorrectSQLAndReturnInstance()
    {
        $query = $this->query->delete();
        $this->assertInstanceOf(Query::class, $query);
        $this->assertSame(
            "DELETE FROM users",
            $this->sql->getValue($query)
        );
    }

    public function testInnerJoinContainCorrectSQLAndReturnInstance()
    {
        $query = $this->query
            ->selectRows("users.name, messages.message")
            ->innerJoin('messages', 'users.id = messages.user_id');

        $this->assertInstanceOf(Query::class, $query);
        $this->assertSame(
            "SELECT users.name, messages.message FROM users INNER JOIN messages ON users.id = messages.user_id",
            $this->sql->getValue($query)
        );
    }

    public function testWhereExpressionContainCorrectSQLAndReturnInstance()
    {
        $query = $this->query->selectRows("email, password")->where('id', '1');

        $this->assertInstanceOf(Query::class, $query);
        $this->assertSame(
            "SELECT email, password FROM users WHERE id = ?",
            $this->sql->getValue($query)
        );
        $this->assertSame(
            ['1'], $this->values->getValue($query)
        );
    }

    public function testAndExpressionContainCorrectSQLAndReturnInstance()
    {
        $query = $this->query->selectRows("email, password")
            ->where('id', '1')
            ->and('email', 'example@email.com');

        $this->assertInstanceOf(Query::class, $query);
        $this->assertSame(
            "SELECT email, password FROM users WHERE id = ? AND email = ?",
            $this->sql->getValue($query)
        );
        $this->assertSame(
            ['1', 'example@email.com'], $this->values->getValue($query)
        );
    }
}
