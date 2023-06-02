<div class="container-fluid padding">
    <div class="row welcome text-center welcome">
        <div class="col-12">
            <h1 class="display-4">Beli Premium </h1>
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
                    <?php if (!empty($premiumesh)) { ?>
                        <?php foreach ($premiumesh as $premium) { ?>
                            <div id="card-product" class="col-md-4">
                                <div class="card mb-5 shadow-sm">
                                    <?php $image = $premium['img']; ?>
                                    <img class="card-img-top" src="<?php echo base_url() . 'public/uploads/premium/' . $image; ?>">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="card-title"><?php echo $premium['name']; ?></h4>
                                            <h4 class="text-muted"><b>Rp<?php echo $premium['price']; ?></b></h4>
                                        </div>
                                        <p class="card-text"><?php echo $premium['about']; ?></p>

                                        <a href="<?php echo base_url() . 'mitra/premium/addToCart/' . $premium['p_id']; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Buy
                                        </a>
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