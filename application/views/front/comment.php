<!-- File: application/views/comments.php -->
<div class="container">
    <h1>Comments</h1>

    <!-- Form untuk menambahkan komentar -->
    <form id="commentForm" action="<?php echo site_url('comment/add_comment'); ?>" method="post">
        <div class="form-group">
            <label for="comment">Leave a comment:</label>
            <textarea class="form-control" id="comment" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <hr>

    <!-- Tampilan komentar -->
    <div id="commentsContainer">
        <?php foreach ($comments as $comment) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text"><?php echo $comment['content']; ?></p>
                    <small class="text-muted"><?php echo $comment['created_at']; ?></small>

                    <!-- Tombol hapus komentar -->
                    <button class="btn btn-sm btn-danger deleteComment" data-comment-id="<?php echo $comment['id']; ?>">Delete</button>

                    <!-- Form untuk menambahkan balasan -->
                    <form class="replyForm mt-3" action="<?php echo site_url('comment/add_reply'); ?>" method="post">
                        <input type="hidden" name="parent_id" value="<?php echo $comment['id']; ?>">
                        <div class="form-group">
                            <label for="reply">Reply:</label>
                            <textarea class="form-control" name="content" rows="2" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Reply</button>
                    </form>

                    <!-- Tampilan balasan -->
                    <?php $replies = $this->Comment_model->get_replies($comment['id']); ?>
                    <?php foreach ($replies as $reply) : ?>
                        <div class="card mt-3 bg-light">
                            <div class="card-body">
                                <p class="card-text"><?php echo $reply['content']; ?></p>
                                <small class="text-muted"><?php echo $reply['created_at']; ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- JavaScript -->
<script>
    // Tampilkan/sembunyikan formulir balasan saat tombol diklik
    document.addEventListener('DOMContentLoaded', function() {
        const replyForms = document.querySelectorAll('.replyForm');
        const showReplyButtons = document.querySelectorAll('.showReplyForm');

        showReplyButtons.forEach(function(button, index) {
            button.addEventListener('click', function() {
                replyForms[index].style.display = 'block';
            });
        });

        // Hapus komentar saat tombol hapus diklik
        const deleteButtons = document.querySelectorAll('.deleteComment');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const commentId = button.dataset.commentId;
                if (confirm('Are you sure you want to delete this comment?')) {
                    // Kirim request hapus komentar ke server
                    fetch('<?php echo site_url('comment/delete_comment'); ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'comment_id=' + commentId
                    }).then(function() {
                        // Hapus elemen komentar dari tampilan
                        const commentCard = button.closest('.card');
                        commentCard.parentNode.removeChild(commentCard);
                    }).catch(function(error) {
                        console.error('Error:', error);
                    });
                }
            });
        });
    });
</script>