<? 
require_once '../models/user.php';


class Message{
    private string $time;
    private string $message;
    private User $user;

    public function __construct($time, $message, $user) {
        $this->user=$user;
        $this->message=$message;
        $this->time=$time;
    }

        public function getTime(): string {
            return $this->time;
        }
    
        public function setTime(string $time): void {
            $this->time = $time;
        }
    
        public function getMessage(): string {
            return $this->message;
        }
    
        public function setMessage(string $message): void {
            $this->message = $message;
        }
    
        public function getUser(): User {
            return $this->user;
        }
    
        public function setUser(User $user): void {
            $this->user = $user;
        }



}