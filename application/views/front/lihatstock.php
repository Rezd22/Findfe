<div class="">
    <div class="container">
        <div id="myTable">
            <div class="row">
                <?php if (!empty($kopieshall)) { ?>
                    <?php foreach ($kopieshall as $kopi) { ?>
                        <hr>
                        <div id="card-product" class="col-md-4">
                            <div class="card mb-5 shadow-sm">
                                <div class="card shadow p-30">
                                    <span>
                                        <h4>Stock</h4></i>
                                    </span>
                                    <hr>
                                    <div class="media">
                                        <div class="media-left meida media-middle">
                                            <span>
                                                <h2><i class="fas fa-coffee"></h2></i>
                                            </span>
                                        </div>
                                        <div class="media-body media-text-right">
                                            <h2><?php echo $kopi['stock']; ?></h2>
                                            <p class="m-b-0"><?php echo $kopi['name']; ?>/kg</p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div class="col-md-3">
                    <?php } ?>
                <?php } else { ?>
                    <div class="jumbotron">
                        <h1>Tidak ada catatan yang ditemukan</h1>
                    </div>
                <?php } ?>

            </div>
        </div>

    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable  #card-product").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>







<div class="container shadow-container">
    <!-- <h2 class="p-2 text-center"></h2> -->
    <!-- <form action="<?php echo base_url() . 'addstock'; ?>" class="container my-3">
            <button type="submit" class="btn btn-primary mr-2">Add Stock</button>

        </form> -->
    <form action="<?php echo base_url() . 'editstock'; ?>" class="container my-3">
        <button type="submit" class="btn btn-primary mr-2">Edit stock</button>
    </form>
    <form action="<?php echo base_url() . 'deletestock'; ?>" class="container my-3">
        <!-- <button type="submit" class="btn btn-primary mr-2">Delete stock</button> -->
        <hr>
        <a class="btn btn-secondary" href="<?php echo base_url() . 'home'; ?>">Back</a>
    </form>
</div>