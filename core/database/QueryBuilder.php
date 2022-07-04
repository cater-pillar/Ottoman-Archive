<?php


class QueryBuilder {

    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function selectAll($table, $orderby) {
        
        $statement = $this->pdo->
        prepare("SELECT * FROM {$table} ORDER BY {$orderby}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function select($table, $orderby, $id_name, $id) {
        
        $statement = $this->pdo->
        prepare(
            "SELECT * FROM {$table} 
             WHERE {$id_name} = {$id} 
             ORDER BY {$orderby}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

 


    public function insert($table, $parameters) {
        
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            str_replace(':', '', implode(
                ', ', array_keys($parameters))
            ),
            implode(', ', array_keys($parameters))
        );
       
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($parameters);
        } catch(Exception $e) {
            die($e->getMessage());
        };         
    }


    public function update($arr, $table, $row_id, $id) {

        $string = '';
        foreach ($arr as $key => $value) {
            $string = "{$string}{$key}=:{$key},";
        }

        $string = trim($string, ',');

        $sql = "UPDATE 
            {$table}  
            SET
            {$string}
            WHERE 
            {$row_id} = :{$row_id}";

        $arr[$row_id] = $id;

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($arr);
        } catch(Exception $e) {
            die($e->getMessage());
        };   
    }


    public function delete($table, $id, $value) {     
        try {
            $statement = $this->pdo->prepare(
                "DELETE FROM {$table} 
                WHERE {$id} = {$value}");
            $statement->execute();
        } catch(Exception $e) {
            die($e->getMessage());
        }
    }

 









public function selectMaxId()
    {
        $statement = $this->pdo
        ->prepare("SELECT MAX(household_id) FROM household");

        $statement->execute();

        return $statement->fetch(PDO::FETCH_NUM)[0];
    }

    public function getId($sql, $id)
    {
        $statement = $this->pdo->prepare($sql);

        $statement->execute([":id" => $id]);

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function getAllIds($sql)
    {
        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
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




    public function byReference($reference, $id) {
            $statement = $this->pdo->prepare(
                "SELECT fk_household_id 
                FROM {$reference}_household
                WHERE fk_{$reference}_id = {$id}");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_COLUMN);
        
    }





    public function lastId()
    {
        try {
            return $this->pdo->lastInsertId();
        } catch(Exception $e) {
            die($e->getMessage());
        }; 
    }




    public function count($entry, $table)
    {
        $statement = $this->pdo->prepare("SELECT COUNT({$entry}) FROM {$table};");

        $statement->execute();

        return $statement->fetchColumn();
    }
}