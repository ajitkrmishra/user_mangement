<?php
// Get the post ID from the URL
$id = $_GET['id'];

// Get the post from the database
$post = $post->read($id);

// Update the post
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $post->update($id, $title, $content);
    header('Location: admin.php');
    exit;
}
?>

<!-- Display the edit form -->
<form method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" value="<?php echo $post['title'];?>" required>

    <label for="content">Content:</label>
    <textarea name="content" required><?php echo $post['content'];?></textarea>

    <button type="submit" name="submit">Update</button>
</form>
