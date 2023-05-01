<div class="conatiner">
    <form id="myForm" action="<?php echo base_url() . 'addstock/addstock' ?>" method="POST" class="form-container mx-auto  shadow-container" style="width:80%" enctype="multipart/form-data">
        <h3 class="mb-3 text-center">Add kopi </h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stock">name</label>
                    <input type="name" class="form-control my-2
                    <?php echo (form_error('stock') != "") ? 'is-invalid' : ''; ?>" id="stock" name="stock" placeholder="Enter stock " value="<?php echo set_value('stock'); ?>" required>
                    <?php echo form_error('stock'); ?>
                    <span></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stock">Qty</label>
                    <input type="number" class="form-control my-2
                    <?php echo (form_error('stock') != "") ? 'is-invalid' : ''; ?>" id="stock" name="stock" placeholder="Enter stock " value="<?php echo set_value('stock'); ?>" required>
                    <?php echo form_error('stock'); ?>
                    <span></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-2">Make Changes</button>
        <a href="<?php echo base_url() . 'lihatstok' ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<script>
    const form = document.getElementById('myForm');
    const resname = document.getElementById("resname");
    const kopiname = document.getElementById("name");
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
        const resnameVal = resname.value.trim();
        const kopinameVal = kopiname.value.trim();
        const priceVal = price.value.trim();
        const aboutVal = about.value.trim();
        const imageVal = image.value.trim();

        if (resnameVal === "--Select Mitra--") {
            setErrorMsg(resname, 'select Mitra name');
        } else {
            setSuccessMsg(resname);
        }
        if (kopinameVal === "") {
            setErrorMsg(kopiname, 'kopi name cannot be blank');
        } else {
            setSuccessMsg(kopiname);
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