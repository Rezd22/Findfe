<!-- File: application/views/ulasan.php -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container">
    <h1>ulasan</h1>

    <!-- Form untuk menambahkan komentar -->
    <form id="commentForm" action="<?php echo site_url('comment/add_comment'); ?>" method="post">
        <div class="form-group">
            <label for="comment">Leave a comment:</label>
            <textarea class="form-control" id="comment" name="content" rows="3" required></textarea>
            <input type="hidden" name="r_id" value="<?php echo $r_id ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <hr>

    <!-- Tampilan komentar -->
    <div id="ulasanContainer">
        <?php foreach ($ulasan as $comment) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text"><?php echo $comment['u_id']; ?></p>
                    <p class="card-text"><?php echo $comment['content']; ?></p>
                    <small class="text-muted"><?php echo $comment['created_at']; ?></small>

                    <!-- Tombol hapus komentar -->

                    <!-- Form untuk menambahkan balasan -->

                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="<?php echo base_url() . '/rating' ?>" class="btn border button">Back</a>
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