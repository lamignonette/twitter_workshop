<?php


/*
CREATE TABLE users(
    user_id INT AUTO_INCREMENT,
    email VARCHAR(60) UNIQUE,
    password CHAR(60),
    description VARCHAR(255),
    PRIMARY KEY(user_id)
)
*/

class User{
    static private $conn;

    private $id;
    private $userName;
    private $email;
    private $description;

    public static function setConnection(mysqli $newConnection){
        self::$conn = $newConnection;
    }

    static public function LogIn($email, $password){
        $sql = "SELECT * FROM users WHERE  email = '$email'";
        $result = self::$conn->query($sql);

        if ($result == true){
            if($result->num_rows ==1){
                $row = $result->fetch_assoc();

                if(password_verify($password, $row["password"])){
                    $loggedUser = new User($row["user_id"], $row["email"], $row["description"]);
                    return $loggedUser;
                }

            }
        }
        return false;
    }

    static public function register($newEmail, $password, $password2, $newDescription){
        if($password != $password2){
            return false;
        }

        $hasshedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql= "INSERT INTO users (email, password, description) VALUES ('$newEmail', '$hasshedPassword', '$newDescription')";
        $result = self::$conn->query($sql);

        if(self::$conn == true){
            $newUser = new User(self::$conn->insert_id, $newEmail, $newDescription);
            return $newUser;

        }
        echo self::$conn->error;
        return false;
    }

    public function __construct($newId, $newEmail, $newDescription){
    $this->id=$newId;
    $this->email = $newEmail;
    $this->setDescription($newDescription);
    }

    public function saveToDB(){
        $sql = "UPDATE users SET description = '{$this->description}' WHERE user_id='{$this->id}'";
        $result=self::$conn->query($sql);
        return $result;
    }

    ///////////////////

    public function createTweet($tweetText){
        // TO DO After
    }

    public function getAllTweets(){
    $ret=[];
    return $ret;
    //after implementing tweet add
}

    public function getAllComments(){
        $ret=[];
        return $ret;
        //after implementing tweet add
    }
    public function CreateComment(){
        $ret=[];
        return $ret;
        //after implementing tweet add
    }
    //////////////////////////

    public function getId()
    {
        return $this->id;
    }

    public function setUserName($newUserName){
        if(is_string($newUserName) && strlen($newUserName)<60){
            $this->userName = $newUserName;
        }
    }

    public function getUserName(){
        return $this->userName;
    }
     public function getEmail(){
         return $this->email;

     }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($newDescription){
        if(is_string($newDescription) && strlen($newDescription)<255){
            return $this->description = $newDescription;
        }
    }
}
