<?
require_once'../models/role.php';
require_once'../database/database.php';
class RoleService{
    private $conn;

    public function __construct()
    {
        $this->conn=new Database();
    }

    public function getRoleIdByName($rolename){
        try{
            $sql="SELECT * FROM `role` WHERE name=:rolename ";
            $result=$this->conn->prepare($sql);
            $result->bindValue(':rolename',$rolename);
            $result->execute();
            if($result){
                $rolefetch=$result->fetch(PDO::FETCH_ASSOC);
                if($rolefetch){
                    return $rolefetch['id'];
                }
            }
        } catch(PDOException $e) {
            throw $e;
        }
    }


}