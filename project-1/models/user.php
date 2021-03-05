<?php
class UserModel extends Model {
    public function Index() {
        return;
    }

    public function Register() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']) {
            if ($post['name'] == '' || $post['email'] == '' || $post['password'] == '') {
                Message::setMsg('Please fill out all fields', 'error');
                return;
            }
            // die('SUBMITTED');
            $password = md5($post['password']);
            $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $this->execute();
            // Verify
            if ($this->lastInsertedId()) {
                // Redirect
                header('Location: '.ROOT_URL.'/users/login');
            }
        }
        return;        
    }

    public function Login() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']) {
            // die('SUBMITTED');
            $password = md5($post['password']);
            $email = md5($post['email']);
            $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $row = $this->single();

            if ($row) {
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                    "id"    => $row['id'],
                    "name"  => $row['name'],
                    "email" => $row['email'] 
                );
                header('Location: '.ROOT_URL.'shares');
            } else {
                Message::setMsg('Incorrect Login', 'error');
            }
        }        
        return;
    }
}
?>
