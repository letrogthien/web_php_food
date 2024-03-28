<? 

class Error{
    
    private $id;
    private $time;
    private $message;

    // Constructor
    public function __construct($id, $time, $message)
    {
        $this->id = $id;
        $this->time = $time;
        $this->message = $message;
    }

    // Getter methods
    public function getId()
    {
        return $this->id;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getMessage()
    {
        return $this->message;
    }

    // Setter methods
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    

    
}