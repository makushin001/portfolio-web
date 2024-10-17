<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/comment-form.css">
    <title>Enter Comment</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/comment-form.css">
</head>
<body>
    <div class="form-container">
        <form action="index.php" method="post">
            <label for="comment">Post Comment:</label><br>
            <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Your projects are great! Keep on the pace!" required></textarea><br>
            <input type="hidden" name="postIDBlog" value="<?php echo $_POST['postID']?>">
            <input name="postComment" type="submit" value="Submit">
        </form>
    </div>
</body>
</html>