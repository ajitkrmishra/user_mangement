<?php


class Post
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($title, $content)
    {
        // Insert the post into the database
        $stmt = $this->db->prepare('INSERT INTO posts (title, content, created_at) VALUES (:title, :content, NOW())');
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();

        // Return the ID of the new post
        return $this->db->lastInsertId();
    }

    public function read($id)
    {
        // Select the post from the database
        $stmt = $this->db->prepare('SELECT * FROM posts WHERE id = :id LIMIT 1');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $post = $stmt->fetch();

        return $post;
    }

    public function update($id, $title, $content)
    {
        // Update the post in the database
        $stmt = $this->db->prepare('UPDATE posts SET title = :title, content = :content WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }

    public function delete($id)
    {
        // Delete the post from the database
        $stmt = $this->db->prepare('DELETE FROM posts WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
?>
