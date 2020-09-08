<?php
/* /src/Service/SrvUsuarios.php */
namespace App\Service;
use Doctrine\DBAL\Driver\Connection;

class SrvUsuarios
{

    /*
    * Devuelve la Lista de Vulnerabilidades de un dominio
    * @param 
    * @return int
    */
    public static function query_all(Connection $connection)
    {

        
        $sql = "SELECT * FROM users";
        $results = $connection->fetchAll($sql);
        
        if (count($results) > 0) {

            $vulnerabilities_by_domain["meta"] = ['page' => 1, 'pages' => 1, 'perpage' => -1, 'total' => count($results), 'sort' => 'asc', 'field' => 'position'];

            $recordID = 0;
            foreach ($results as $key => $value) {

                $recordID += 1;
                $vulnerabilities_by_domain["data"][] = ["position" => $recordID,
                                                        "id"        => doubleval($value["id"]),
                                                        "email"     => $value["email"],
                                                        "roles"     => $value["roles"],
                                                        "firstname" => $value["firstname"],
                                                        "lastname"  => $value["lastname"],
                                                        "active"    => intval($value["active"]),
                                                        ];
            }

        } else {
             $vulnerabilities_by_domain = "[]";
        }

        $connection->close();
        
        return $vulnerabilities_by_domain;
    } 

 
}