<?php 

namespace WsChatApi\Libraries\DB;

class Query
{
    /**
     * Database connection instance 
     * @var \WsChatApi\Libraries\DB\IDatabaseJoiner 
     */ 
    private ?IDatabaseJoiner $joiner = null;

    /**
     * PDO class instance 
     * @var \PDO   
     */ 
    private ?\PDO $connection = null;

    /**
     * SQL query
     * @var string 
     */ 
    private string $sql = '';

    /**
     * Table name which specified in
     * data access layer class
     * @var string 
     */ 
    private string $table;

    /**
     * Values which will be use in prepared
     * SQL statements
     * @var string|array
     */ 
    private $values;

    /**
     * Initiate Query constructor method and set table
     * where will be query data and connection with database
     * @param \WsChatApi\Libraries\DB\IDatabaseJoiner
     * @param string $table 
     * @return void 
     */ 
    public function __construct(IDatabaseJoiner $joiner, string $table)
    {
        $this->joiner = $joiner;
        $this->table = $table;
        $this->connection = $this->joiner->join();
    }

    /**
     * Return data from SQL statement using query()
     * method of \PDO class 
     * @return array 
     */ 
    public function getFromQuery()
    {
        $statement = $this->connection->query($this->sql);

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Return datafrom SQL statement using prepare()
     * method of \PDO class
     */ 
    public function getFromPrepared()
    {
        $statement = $this->connection->prepare($this->sql);

        $statement->execute($this->values);
        return $statement->fetchAll();
    }

    /**
     * Execute SQL statement with data. Usually use with
     * insert, update and delete methods 
     * @return bool
     */ 
    public function push()
    {
        $statement = $this->connection->prepare($this->sql);
        return $statement->execute($this->values);
    }

    /**
     * Shape SQL statement with all columns
     * @return \WsChatApi\Libraries\DB\Query
     */ 
    public function selectAll()
    {
        $this->sql .= "SELECT * FROM {$this->table}";
        return $this;
    }

    /**
     * Shape SQL statement with specified columns
     * @return \WsChatApi\Libraries\DB\Query
     */ 
    public function selectRows(string $rows)
    {
        $this->sql .= "SELECT {$rows} FROM {$this->table}";
        return $this;
    }


    /**
     * Shape SQL statement which insert data in database
     * @param string $rows | name = ?, email = ? 
     * @param array $values | ['John', 'example@mail.com']
     * @return \WsChatApi\Libraries\DB\Query
     */ 
    public function insert(string $rows, array $values)
    {
        $questionMarks = QuestionMarkGenerator::generate($values); 

        $this->sql .= "INSERT INTO {$this->table} ({$rows}) VALUES ({$questionMarks})";
        $this->values = $values;
        return $this;
    }
 
    /**
     * Shape SQL statement which update specified columns
     * in database
     * @param string $columns | name = ?, email = ?
     * @param array $values | ['John', 'john@mail.com']
     * @return \WsChatApi\Libraries\DB\Query
     */ 
    public function update(string $columns, array $values)
    {
        $this->sql .= "UPDATE {$this->table} SET {$columns}";
        $this->values = $values;
        return $this;
    }

    /**
     * Shape SQL statement which delete specified records
     * from database
     * @return \WsChatApi\Libraries\DB\Query 
     */ 
    public function delete()
    {
        $this->sql .= "DELETE FROM {$this->table}"; 
        return $this;
    }

    /**
     * SQL expression which can be used with query 
     * methods. Alternative WHERE in SQL statement
     * @param string $row | name = ?
     * @param string $uniqueValue
     * @return \WsChatApi\Libraries\DB\Query 
     */ 
    public function where(string $row, string $uniqueValue)
    {
        $this->sql .= " WHERE {$row} = ?";
        $this->values[] = $uniqueValue;
        return $this;
    }

    /**
     * SQL expression which can be used with query 
     * methods. Alternative AND in SQL statement
     * @param string $row | name = ?
     * @param string $uniqueValue
     * @return \WsChatApi\Libraries\DB\Query 
     */ 
    public function and(string $row, string $uniqueValue)
    {
        $this->sql .= " AND {$row} = ?";
        $this->values[] = $uniqueValue;
        return $this;
    }
}
