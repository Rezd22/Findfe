<div class="container-fluid padding">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Mitra</h1>
        </div>
        <hr>
    </div>
</div>
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            <h2>All Mitra</h2>
        </div>
        <input class="form-control mb-3" id="myInput" type="text" placeholder="Search .." style="width:50%;">
    </div>
    <div class="">
        <div class="container">
            <div id="myTable">
                <div class="row">
                    <?php if (!empty($stores)) { ?>
                        <?php foreach ($stores as $store) { ?>
                            <div id="card-product" class="col-md-4">
                                <div class="">
                                    <div class="card mb-5 shadow-sm">
                                        <?php $image = $store['img']; ?>
                                        <img class="card-img-top" src="<?php echo base_url() . 'public/uploads/toko/' . $image; ?>">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $store['name']; ?></h4>
                                            <p class="card-text mb-0"><?php echo $store['c_name'] . " toko"; ?></p>
                                            <p class="card-text mb-0"><?php echo $store['address']; ?></p>
                                            <hr>
                                            <p class="card-text mb-0"></p>
                                            <p class="card-text mb-0">OPENING HOURS</p>
                                            <p class="card-text mb-0"><?php echo $store['o_days']; ?></p>
                                            <p class="card-text"><?php echo $store['o_hr']; ?> - <?php echo $store['c_hr']; ?></p>
                                            <hr>
                                            <a href="<?php echo base_url() . 'kopi/list/' . $store['r_id']; ?>" class="btn btn-primary">View
                                                Menu</a>
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