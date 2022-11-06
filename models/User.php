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

        $sql = "SELECT id,username,password,email FROM user WHERE username = ? AND password = ?";

        $stmt = $conn->prepare($sql);   // using prepared statement to avoid SQL Injection
        $stmt->bind_param("ss", $this->username, $this->password);   //s for string


        $stmt->execute();

        $result = $stmt->get_result();
        $success = false;
        
        if($result && $result->num_rows>0)
        {
            $row = $result->fetch_assoc();   //return assoc array, where each element is column with name in table
            
            $this->id = $row['id'];
            $this->email = $row['email'];

            $success = true;

        }

        $stmt->close();
        return $success;
    }
    

    function create(mysqli $conn)
    {
        $sql = "INSERT INTO user (username,password,email) VALUES (?,?,?)";

        $stmt = $conn->prepare($sql);   // using prepared statement to avoid SQL Injection
        $stmt->bind_param("sss", $this->username, $this->password,$this->email);   //s for string

        
        $success = $stmt->execute();

        $stmt->close();

        return $success;

    }

    function update(mysqli $conn)
    {
        $sql = "UPDATE user SET username = ?, password = ?, email = ? WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi",$this->username,$this->password,$this->email,$this->id);

        $success = $stmt->execute();

        $stmt->close();

        return $success;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getEmail()
    {
        return $this->email;
    }

    
    function getPassword()
    {
        return $this->password;
    }

    function setUsername($username)
    {
         $this->username = $username;
    }

    function setEmail($email)
    {
         $this->email = $email;
    }

    
    function setPassword($password)
    {
         $this->password = $password;
    }
}



?>