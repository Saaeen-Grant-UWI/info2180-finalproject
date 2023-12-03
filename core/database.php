<?php
    
    function connect() {
        $pdo = new PDO ("mysql:host=localhost;dbname=dolphin_crm", "root","");
        return $pdo;
    }
       

    function get_all($table) {
        $statement = connect()->query("select * from ".$table);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `role`, `created_at`) VALUES (NULL, 'John ', 'Doe', 'password', 'johndoe@example.com', 'admin', '2023-12-03 04:16:54.000000');

    function get_where($table, $data) {
        $statement = connect()->prepare("select * from ".$table." where ".$data[0]." = ?");
        $statement->execute([$data[1]]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

?>