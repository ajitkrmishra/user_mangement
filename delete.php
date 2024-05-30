<?php
// Get the post ID from the URL
$id = $_GET['id'];

// Delete the post
$post->delete($id);
header('Location: admin.php');
exit;
?>
