<?
class Cart{
    private $id;
    private $user_id;

    public function __construct($id, $user_id) {
        $this->id = $id;
        $this->user_id=$user_id;
    }

    public function getId(){
        return $this->id;
    }
    public function getUser_Id(){
        return $this->user_id;
    }
    public function setId($id){
        $this->user_id=$id;
    }
    public function setUser_Id($user_id){
        $this->user_id=$user_id;
    }
    
}