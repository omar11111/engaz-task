<?php
class UserRepository
{
    // dbection
    private $db;

    private $db_table = "users";

    public $name;
    public $email;
    public $password;

    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function register($name, $email, $password)
    {
        if (
            !isset($name) ||
            !isset($email) ||
            !isset($password) ||
            empty(trim($name)) ||
            empty(trim($email)) ||
            empty(trim($password))
        ) :
            sendJson(
                422,
                'Please fill all the required fields & None of the fields should be empty.',
                ['required_fields' => ['name', 'email', 'password']]
            );
        endif;


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
            sendJson(422, 'Invalid Email Address!');

        elseif (strlen($password) < 8) :
            sendJson(422, 'Your password must be at least 8 characters long!');

        elseif (strlen($name) < 3) :
            sendJson(422, 'Your name must be at least 3 characters long!');

        endif;
        

        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $row_num = $this->getUserData($email);
        if ($row_num != 0) sendJson(422, 'This E-mail already in use!');
        $sql = "INSERT INTO `users`(`name`,`email`,`password`) VALUES('$name','$email','$hash_password')";
        $record = $this->db->query($sql);

        if ($record) sendJson(201, 'You have successfully registered.');
        
    }
    public function login($email, $password)
    {
        if (
            !isset($email) ||
            !isset($password) ||
            empty(trim($email)) ||
            empty(trim($password))
        ) :
            sendJson(
                422,
                'Please fill all the required fields & None of the fields should be empty.',
                ['required_fields' => ['email', 'password']]
            );
        endif;

        $password = trim($password);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        sendJson(422, 'Invalid Email Address!');

    elseif (strlen($password) < 8) :
        sendJson(422, 'Your password must be at least 8 characters long!');
    endif;

    $userData = $this->getUserData($email);
    if (!$userData) sendJson(404, 'User not found! (Email is not registered)');

    if (!password_verify($password, $userData['password'])) sendJson(401, 'Incorrect Password!');
    
    $userData['token'] = encodeToken($userData['id']);

    // hide password
    unset($userData['password']);
    return $userData;


    }

    public function getUserData($email)
    {
        $sqlQuery = "SELECT * FROM
        " . "$this->db_table" . " WHERE email = " .'"'.$email.'"';
        $record = $this->db->query($sqlQuery);
       
        if ($record->num_rows == 0) {
            return 0;
        }
        $dataRow = $record->fetch_assoc();
        return $dataRow;
    }
}




// UPDATE
