<?
 //class chua doi tuong user
 class User{
    private int $id;
    private string $username;
    private string $password;
    private string $email;
    private int $role_id;
    
    public function __construct(int $id,string $username,string $password,string $email,int $role_id ) {
        $this->id=$id;
        $this->username=$username;
        $this->password=$password;
        $this->email=$email;
        $this->role_id=$role_id;
        
    }
    public function getId(): int {
        return $this->id;
    }

    // Setter for id
    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter for username
    public function getUsername(): string {
        return $this->username;
    }

    // Setter for username
    public function setUsername(string $username): void {
        $this->username = $username;
    }

    // Getter for password
    public function getPassword(): string {
        return $this->password;
    }

    // Setter for password
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    // Getter for email
    public function getEmail(): string {
        return $this->email;
    }

    // Setter for email
    public function setEmail(string $email): void {
        $this->email = $email;
    }

    // Getter for role_id
    public function getRoleId(): int {
        return $this->role_id;
    }

    // Setter for role_id
    public function setRoleId(int $role_id): void {
        $this->role_id = $role_id;
    }
    
 



 }