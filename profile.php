<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

$stmt = $conn->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$posts = $stmt->get_result();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prodigy Social Media App </title>
    <link rel="stylesheet" href="style.css"> <!-- Link to the CSS file -->
</head>
<body>
    
<h1><?php echo $user['username']; ?>'s Profile</h1>

<form method="POST" action="post.php" enctype="multipart/form-data">
    <textarea name="content" placeholder="What's on your mind?" required></textarea>
    <input type="file" name="image">
    <button type="submit">Post</button>
</form>

<h2>Your Posts</h2>
<?php while ($post = $posts->fetch_assoc()): ?>
    <div>
        <p><?php echo $post['content']; ?></p>
        <?php if ($post['image']): ?>
            <img src="<?php echo $post['image']; ?>" width="200">
        <?php endif; ?>
        <form method="POST" action="like.php">
            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
            <button type="submit">Like</button>
        </form>
        <form method="POST" action="comment.php">
            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
            <input type="text" name="comment" placeholder="Add a comment" required>
            <button type="submit">Comment</button>
        </form>
    </div>
<?php endwhile; ?>

</body>
</html>
