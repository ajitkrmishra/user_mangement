<?php
// Create a new post
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $post->create($title, $content);
    header('Location: admin.php');
    exit;
}
?>

<!-- Display the create form -->
<form method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" required>

    <label for="content">Content:</label>
    <textarea name="content" required></textarea>

    <button type="submit" name="submit">Create</button>
</form>
