<?php

class QueryBuilder {

    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function selectAll($table, $orderby)
    {
        $statement = $this->pdo->prepare("SELECT * FROM {$table} ORDER BY {$orderby}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectMaxId()
    {
        $statement = $this->pdo->prepare("SELECT MAX(household_id) FROM household");

        $statement->execute();

        return $statement->fetch(PDO::FETCH_NUM)[0];
    }

    public function getId($sql, $id)
    {
        $statement = $this->pdo->prepare($sql);

        $statement->execute([":id" => $id]);

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }



    public function selectClassPerId($class, $id)
    {   
        $nu = $id['id'];
        $statement = $this->pdo->prepare($class::select($nu));
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, $class);
    }




    public function selectClassAll($class)
    {   
        $statement = $this->pdo->prepare($class::selectAll());
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, $class);
    }




    public function selectColumns($column, $table)
    {
        $statement = $this->pdo->prepare("SELECT {$column} FROM {$table} ORDER BY {$column}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function edit($table, $set_key, $id_key, $set_value, $id_value)
    {
        $sql = "UPDATE 
        {$table}  
        SET
        {$set_key} = :x
        WHERE 
        {$id_key} = :id";

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute([
                ':x' => $set_value,
                ':id' => $id_value
            ]);
        } catch(Exception $e) {
            die($e->getMessage());
        };

        
    }

    public function editHousehold() {
        
    }


    public function insert($table, $parameters) {
        

            $sql = sprintf(
                'insert into %s (%s) values (%s)',
                $table,
                str_replace(':', '', implode(', ', array_keys($parameters))),
                implode(', ', array_keys($parameters))
            );
            
           /*  die(var_dump($sql)); */
           
            try {
                $statement = $this->pdo->prepare($sql);

                $statement->execute($parameters);

            } catch(Exception $e) {
                die($e->getMessage());
            };
            
    }

    public function lastId()
    {
        try {
            return $this->pdo->lastInsertId();
        } catch(Exception $e) {
            die($e->getMessage());
        }; 
    }


    public function delete($table, $id, $value)
    {
        
        try {
            $statement = $this->pdo->prepare(
                "DELETE FROM {$table} 
                WHERE {$id} = {$value}");
            $statement->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }
        
    }

    public function count($entry, $table)
    {
        $statement = $this->pdo->prepare("SELECT COUNT({$entry}) FROM {$table};");

        $statement->execute();

        return $statement->fetchColumn();
    }
}