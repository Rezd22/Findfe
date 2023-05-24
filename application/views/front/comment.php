<div id="comments">
    <?php foreach ($comments as $comment) : ?>
        <div class="comment">
            <div class="author"><?php echo $comment['user_id']; ?></div>
            <div class="content"><?php echo $comment['content']; ?></div>
        </div>
    <?php endforeach; ?>
</div>

<div id="comment-form">
    <?php
    // sanitize and validate user input
    echo form_open('comment/create');
    ?>
    <textarea name="content"></textarea>
    <input type="submit" value="Kirim">
    <?php echo form_close(); ?>
</div>