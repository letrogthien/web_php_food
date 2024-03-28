<?
require_once'../database/database.php';
require_once'../models/user.php';
require_once'../services/roleService.php';

//class chua cac method CRUD lien quan den user
class UserService{
    private $conn;
    

    public function __construct()
    {
       
        $this->conn=new Database();
    }



    //xac minh user bang name va password
    public function authUser(string $name,string $password) {
        try {

        
        $sql="SELECT * FROM `user` WHERE name =:name ";
        $result= $this->conn->prepare($sql);
        $result->bindParam(':name',$name);
        $result->execute();
        if ($result){
            $userInfo = $result->fetch(PDO::FETCH_ASSOC); 
            if($userInfo){
                if(password_verify($password, $userInfo['password'])) {
                   
                    return true;
                } else {
                   
                    return false;
                }
            }
        } else {
           
            return false;
        }
        }
        catch (PDOException $e) {
            throw $e;
        } 
        
    }
   
    public function changeUserInfor($id, $name, $password, $email, $role_id)
    {
        try {
            $updateFields = [];
    
            if (!empty($name)) {
                $updateFields[] = "name = :name";
            }
            if (!empty($password)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $updateFields[] = "password = :password";
            }
            if (!empty($email)) {
                $updateFields[] = "email = :email";
            }
            if (!empty($role_id)) {
                $updateFields[] = "role_id = :role_id";
            }
    
            if (empty($updateFields)) {
                return false;
            }
    
            $updateString = implode(', ', $updateFields);
    
            $sql = "UPDATE `user` SET $updateString WHERE id = :id";
    
            $result = $this->conn->prepare($sql);
    
            if (!empty($name)) {
                $result->bindParam(':name', $name);
            }
            if (!empty($password)) {
                $result->bindParam(':password', $hashedPassword);
            }
            if (!empty($email)) {
                $result->bindParam(':email', $email);
            }
            if (!empty($role_id)) {
                $result->bindParam(':role_id', $role_id);
            }
    
            $result->bindParam(':id', $id);
    
            $result->execute();
    
            return true;
        } catch (PDOException $e) {
            // Log the error or throw a more meaningful exception
            error_log("Error in changeUserInfor: " . $e->getMessage());
            throw new RuntimeException("An error occurred while updating user information.");
        }
    }
     
    

    public function getAllUsers() {
        try {
            $sql = "SELECT * FROM `user`";
            $result = $this->conn->prepare($sql);
            $result->execute();

            $users = [];

            while ($userInfo = $result->fetch(PDO::FETCH_ASSOC)) {
                $user = new User(
                    $userInfo['id'],
                    $userInfo['name'],
                    $userInfo['password'],
                    $userInfo['email'],
                    $userInfo['role_id']
                );
                $users[] = $user;
            }

            return $users;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getUserById($userId) {
        try {
            $sql = "SELECT * FROM `user` WHERE id = :userId";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':userId', $userId);
            $result->execute();

            $userInfo = $result->fetch(PDO::FETCH_ASSOC);

            if ($userInfo) {
                $user = new User(
                    $userInfo['id'],
                    $userInfo['name'],
                    $userInfo['password'],
                    $userInfo['email'],
                    $userInfo['role_id']
                );

                return $user;
            } else {
                return null; // Return null if user with the given ID is not found
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function deleteUserById($userId) {
        try {
            $sql = "DELETE FROM `user` WHERE id = :userId";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':userId', $userId);
            $result->execute();

            if ($result) {
                return true; // User deleted successfully
            } else {
                return false; // Unable to delete user
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }
    //tra ve doi tuong user theo name
    public function getUserByName(string $name){
        try{
        $sql="SELECT * FROM `user` WHERE name=:name ";
        $result= $this->conn->prepare($sql);
        $result->bindParam(':name',$name);
        $result->execute();
        if ($result) {
            $userInfo = $result->fetch(PDO::FETCH_ASSOC); 
            if ($userInfo) {
               
                $user = new User(
                    $userInfo['id'],
                    $userInfo['name'],
                    $userInfo['password'],
                    $userInfo['email'],
                    $userInfo['role_id']
                );
               

                return $user;
            }
            else {
                return null;
           }
        } 
        }catch (PDOException $e) {
            throw $e;
        } 
    }
    public function getIdByUsername($name){
        try{
            $sql="SELECT * FROM `user` WHERE name=:name ";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':name',$name);
            $result->execute();
            if ($result) {
                $userInfo = $result->fetch(PDO::FETCH_ASSOC); 
                if ($userInfo) {
                   
                   $userId=$userInfo['id'];
                   
    
                    return $userId;
                }
            } else {
                return false;
            }
            }catch (PDOException $e) {
                throw $e;
            } 
                

    }

    public function getRoleByname($name){
        try{
            $sql="SELECT * FROM `user` WHERE name=:name ";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':name',$name);
            $result->execute();
            if ($result) {
                $userInfo = $result->fetch(PDO::FETCH_ASSOC); 
                if ($userInfo) {
                   
                   $userRole=$userInfo['role'];
                    
    
                    return $userRole;
                }
            } else {
                return false;
            }
            }catch (PDOException $e) {
                throw $e;
            } 

    }

    public function addUserToDataBase($name,$password,$email){
        try{
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $roleService = new RoleService();
            $roleId=$roleService->getRoleIdByName('user');
            $sql="INSERT INTO `user` (name, password, email, role_id) VALUES (:name, :password, :email, :role_id)";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':name',$name);
            $result->bindParam(':password',$hashedPassword);
            $result->bindParam(':email',$email);
            $result->bindParam(':role_id',$roleId);
            $result->execute();
            if($result){
                return true;
            } else {
                return false;
            }
            }catch (PDOException $e) {
                throw $e;
            }
    }

    public function startSession(){
        return session_start();
    }

    public function setSession($name) {
        if(session_status() != PHP_SESSION_ACTIVE){
            $this->startSession();
        }
        $user=$this->getUserByName($name);
        $_SESSION['name']=$user->getUsername();
        $_SESSION['id']=$user->getId();

        $_SESSION['role_id']=$user->getRoleId();

        
    }
    public function getSession() {
        if(session_status() != PHP_SESSION_ACTIVE){
            $this->startSession();
        }
        
        $desiredVariables = ['name', 'id', 'role_id'];
        $sessionData = [];
        foreach ($desiredVariables as $variable) {
            if (isset($_SESSION[$variable])) {
                $sessionData[$variable] = $_SESSION[$variable];
            }
        }
        return $sessionData;
    }
    
    public function clearSession(){
        if (isset($_SESSION)){
            session_destroy();
        }
    }

   
}