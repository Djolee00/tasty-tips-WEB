<?php 

class User{

    private $id;
    private $username;
    private $password;
    private $email;

    function __construct($username=null,$password=null,$email=null)
    {
        $this->id=NULL;
        $this->username=$username;
        $this->password=$password;
        $this->email=$email;
    }

    /**
     * function to log in user
     */
    function login(mysqli $conn)
    {
        $sql = "SELECT * FROM users WHERE username = '$this->username' AND password = '$this->password';";
        
        
        $result = $conn->query($sql);
        if($result && $result->num_rows>0)
        {
            $row = $result->fetch_assoc();   //return assoc array, where each element is column with name in table
            
            $this->id = $row['id'];
            $this->email = $row['email'];

            return true;

        }else return false;
        
    }
    

}



?>