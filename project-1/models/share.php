<?php
class ShareModel extends Model {
    public function index() {
        $this->query('SELECT * FROM shares ORDER BY create_date DESC');
        $rows = $this->resultSet();
        // print_r($rows);
        return $rows;
    }

    public function add() {
        // Sanitize POST
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['submit']) {
            if ($post['title'] == '' || $post['body'] == '' || $post['link'] == '') {
                Message::setMsg('Please fill out all fields', 'error');
                return;
            }
            $this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
            $this->bind(':title', $post['title']);
            $this->bind(':body', $post['body']);
            $this->bind(':link', $post['link']);
            $this->bind(':user_id', 1);
            $this->execute();
            // Verify
            if ($this->lastInsertedId()) {
                // Redirect
                header('Location: '.ROOT_URL.'shares');
            }
        }
        return;
    }
}
?>
