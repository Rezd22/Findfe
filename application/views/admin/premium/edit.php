<div class="conatiner">
    <form id="myForm" action="<?php echo base_url() . 'admin/premium/edit/' . $premium['p_id']; ?>" method="POST" class="form-container mx-auto  shadow-container" style="width:80%" enctype="multipart/form-data">
        <h3 class="mb-3 text-center">Edit premium "<?php echo $premium['name']; ?>"</h3>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">premium Name</label>
                    <input type="text" class="form-control my-2 
                    <?php echo (form_error('name') != "") ? 'is-invalid' : ''; ?>" name="name" id="name" placeholder="Enter premium name" value="<?php echo set_value('name', $premium['name']); ?>">
                    <span></span>
                    <?php echo form_error('name'); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="Price" class="form-control my-2
                    <?php echo (form_error('price') != "") ? 'is-invalid' : ''; ?>" id="price" name="price" placeholder="Enter Price" value="<?php echo set_value('price', $premium['price']); ?>">
                    <span></span>
                    <?php echo form_error('price'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="about">About</label>
                    <input type="text" class="form-control my-2
                    <?php echo (form_error('about') != "") ? 'is-invalid' : ''; ?>" id="about" name="about" placeholder="About" value="<?php echo set_value('about', $premium['about']); ?>">
                    <span></span>
                    <?php echo form_error('about'); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="img">Produk Image</label>
                    <input type="file" id="image" name="image" placeholder="Enter Image" class="form-control my-2
                    <?php echo (!empty($errorImageUpload))  ? 'is-invalid' : ''; ?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>

                    <?php if ($premium['img'] != "" && file_exists('./public/uploads/premiumesh/thumb/' . $premium['img'])) { ?>

                        <img src="<?php echo base_url() . 'public/uploads/premiumesh/thumb/' . $premium['img']; ?>">

                    <?php } else { ?>
                        <img width="300" src="<?php echo base_url() . 'public/uploads/no-image.png' ?>">
                    <?php } ?>
                    <span></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-2">Make Changes</button>
        <a href="<?php echo base_url() . 'admin/premium/index' ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<script>
    const form = document.getElementById('myForm');

    const premiumname = document.getElementById("name");
    const price = document.getElementById("price");
    const about = document.getElementById("about");
    const image = document.getElementById("image");

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        validate();
    })

    const sendData = (sRate, count) => {
        if (sRate === count) {
            event.currentTarget.submit();
        }
    }

    const successMsg = () => {
        let formCon = document.getElementsByClassName('form-control');
        var count = formCon.length - 2;
        for (var i = 0; i < formCon.length; i++) {
            if (formCon[i].className === "form-control my-2 success") {
                var sRate = 0 + i;
                sendData(sRate, count);
            } else {
                return false;
            }
        }
    }

    const validate = () => {

        const premiumnameVal = premiumname.value.trim();
        const priceVal = price.value.trim();
        const aboutVal = about.value.trim();
        const imageVal = image.value.trim();


        if (premiumnameVal === "") {
            setErrorMsg(premiumname, 'premium name cannot be blank');
        } else {
            setSuccessMsg(premiumname);
        }
        if (priceVal === "") {
            setErrorMsg(price, 'price cannot be blank');
        } else {
            setSuccessMsg(price);
        }
        if (aboutVal === "") {
            setErrorMsg(about, 'about cannot be blank');
        } else {
            setSuccessMsg(about);
        }

        successMsg();

    }

    function setErrorMsg(ele, errormsgs) {
        const formCon = ele.parentElement;
        const formInput = formCon.querySelector('.form-control');
        const span = formCon.querySelector('span');
        span.innerText = errormsgs;
        formInput.className = "form-control my-2 is-invalid";
        span.className = "invalid-feedback font-weight-bold";
    }

    function setSuccessMsg(ele) {
        const formGroup = ele.parentElement;
        const formInput = formGroup.querySelector('.form-control');
        formInput.className = "form-control my-2 success";
    }
</script>