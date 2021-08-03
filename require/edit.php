<?php

// Function to create SQL query for editing data

function edit($edit_value, $table, $column, $condition, $id, $conn, $var_id) {
            $edit = $conn -> prepare(
                "UPDATE 
                ".$table." 
                SET 
                " .$column. " = ?
                WHERE 
                ".$condition." = ?"
            );
            $edit -> bind_param($var_id. 'i',
                                $edit_value,
                                $id);
            $alert = 'Failed';
                if ($edit -> execute()) {
                $alert = 'Success';
                };
                echo $alert;
        };

?>