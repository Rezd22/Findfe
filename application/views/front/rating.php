<html>

<head>
    <title> Rating in Findfe</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container box">

        <h3 align="center">Rating in Findfe</h3>
        <br />
        <h1>Most Popular Stores By Rating</h1>
        <ul>
            <?php if (!empty($popular_stores)) : ?>
                <?php foreach ($popular_stores as $store) : ?>
                    <li><?php echo $store['name']; ?>(Average Rating: <?php echo $store['avg_rating']; ?>)</li>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Tidak ada toko populer yang ditemukan.</p>
            <?php endif; ?>
        </ul>
        <hr class="hr hr-blurry" />
        <span id="r_list"></span>
        <br>

        <?php

        ?>
        <div>><a href="<?php echo base_url() . 'home'; ?>" class="btn btn-warning"><i class="fas fa-angle-left"></i>
                Back</a></div>
        <?php


        ?>


    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        load_data();

        function load_data() {
            $.ajax({
                url: "<?php echo base_url(); ?>rating/fetch",
                method: "POST",
                success: function(data) {
                    $('#r_list').html(data);
                }
            })
        }

        $(document).on('mouseenter', '.rating', function() {
            var index = $(this).data('index');
            var r_id = $(this).data('r_id');
            remove_background(r_id);
            for (var count = 1; count <= index; count++) {
                $('#' + r_id + '-' + count).css('color', '#ffcc00');
            }
        });

        function remove_background(r_id) {
            for (var count = 1; count <= 5; count++) {
                $('#' + r_id + '-' + count).css('color', '#ccc');
            }
        }

        $(document).on('click', '.rating', function() {
            var index = $(this).data('index');
            var r_id = $(this).data('r_id');
            $.ajax({
                url: "<?php echo base_url(); ?>rating/insert",
                method: "POST",
                data: {
                    index: index,
                    r_id: r_id
                },
                success: function(data) {
                    load_data();
                    alert("You have rate " + index + " out of 5");
                }
            })
        });

        $(document).on('mouseleave', '.rating', function() {
            var index = $(this).data('index');
            var r_id = $(this).data('r_id');
            var rating = $(this).data('rating');
            remove_background(r_id);
            for (var count = 1; count <= rating; count++) {
                $('#' + r_id + '-' + count).css('color', '#ffcc00');
            }
        });

    });
</script>