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

    function insert($table, $data){
        $statement = connect()->prepare("INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `role`, `created_at`) VALUES (NULL, ?, ?, ?, ?, ?, '2023-12-03 04:16:54.000000')");
        // switch($table){
        //     case "users":
        //         $statement = connect()->prepare("insert into ".$table." (`id`, `firstname`, `lastname`, `password`, `email`, `role`, `created_at`) values (NULL, ?, ?, ?, ?, ?, 2023-12-03 04:16:54)");
        //         break;
                
        //     case "contacts":
        //         $statement = connect()->prepare("insert into ".$table." (`id`, `title`, `firstname`, `lastname`, `email`, `telephone`, `company`, `type`, `assigned_to`, `created_by`, `created_at`, `updated_at`) values (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        //         break;

        //     case "notes":
        //         $statement = connect()->prepare("insert into ".$table." (`id`, `contact_id`, `comment`, `created_by`, `created_at`) values (NULL, ?, ?, ?, ?)");
        //         break;
        // }
        if(!is_array($statement )) {
            $statement->execute($data);
        }
        
    }

?>