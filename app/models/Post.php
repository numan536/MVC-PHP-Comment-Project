<?php

class Post {

    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function findAllPosts()
    {
        $this->db->query('SELECT * FROM posts ORDER BY created_at ASC');
        $results = $this->db->resultSet();

        return $results;
    }
    public function addPost($data)
    {     

        $this->db->query('INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']); 

        if ($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function findPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;

    }

    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        if ($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }

    }

    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }

    }

    public function singlePost($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');

        $this->db->bind(':id', $id);

        $results = $this->db->single();

        return $results;
    }


    public function allcomment()
    {
        $this->db->query('SELECT * FROM comments');
        $results = $this->db->resultSet();
        return $results;
    }


    public function singleComment($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');

        $this->db->bind(':id', $id);

        $results = $this->db->single();

        return $results;
    }

    public function addComment($data)
    {       
        $this->db->query('INSERT INTO comments (post_id, user_id, comment) VALUES (:post_id, :user_id, :comment)');

        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':comment', $data['comment']);

        if ($this->db->execute()) {
            return true;
        }
        else {
            return false;
        }

    }
    
}

?>
