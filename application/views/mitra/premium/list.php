<div class="container">
    <div class="container shadow-container">
        <?php if ($this->session->flashdata('success') != "") : ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif ?>
        <?php if ($this->session->flashdata('error') != "") : ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif ?>
        <div class="container-fluid padding">
            <div class="row welcome text-center welcome">
                <div class="col-12">
                    <h1 class="display-4">Premium Sales!!</h1>
                </div>
                <hr>
            </div>
        </div>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <h2>All Premium</h2>
                </div>
                <input class="form-control mb-3" id="myInput" type="text" placeholder="Search .." style="width:50%;">
            </div>
            <div class="">
                <div class="container">
                    <div id="myTable">
                        <div class="row">
                            <?php if (!empty($premiums)) { ?>
                                <?php foreach ($premiums as $premium) { ?>
                                    <div id="card-product" class="col-md-4">
                                        <div class="">
                                            <div class="card mb-5 shadow-sm">
                                                <?php $image = $premium['img']; ?>
                                                <img class="card-img-top" src="<?php echo base_url() . 'public/uploads/premium/' . $image; ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $premium['p_name']; ?></h4>
                                                    <!-- <p class="card-text mb-0"><?php echo $premium['c_name'] . " toko"; ?></p> -->
                                                    <!-- <p class="card-text mb-0"><?php echo $premium['address']; ?></p> -->
                                                    <hr>
                                                    <p class="card-text mb-0"></p>
                                                    <p class="card-text mb-0">OPENING HOURS</p>
                                                    <p class="card-text mb-0"><?php echo $premium['o_days']; ?></p>
                                                    <p class="card-text"><?php echo $premium['o_hr']; ?> - <?php echo $premium['c_hr']; ?></p>
                                                    <hr>
                                                    <a href="<?php echo base_url() . 'premium/addToCart/' . $premium['p_name']; ?>" class="btn btn-primary"> Buy Premium</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div class="col-md-3">
                                <?php } ?>
                            <?php } else { ?>
                                <div class="jumbotron">
                                    <h1>Tidak ada premium yang ditemukan</h1>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <!-- </table> -->
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
    </div>
</div>
<script>
    function deleteOrder(id) {
        if (confirm("Are you sure you want to delete orders?")) {
            window.location.href = '<?php echo base_url() . 'mitra/orders/deleteOrder/'; ?>' + id;
        }
    }

    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>