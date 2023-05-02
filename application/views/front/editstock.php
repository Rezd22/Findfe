<div class="conatiner">
    <form action="<?php echo base_url() . 'editstock/editstock'; ?>" method="POST" id="myForm" name="myForm" class="form-container mx-auto  shadow-container" style="width:80%" enctype="multipart/form-data">
        <h3 class="mb-3 text-center">Edit Stock Items</h3>
        <div class="form-group">
            <label class="control-label">Select Kopi</label>
            <select name="rname" id="resname" class="form-control <?php echo (form_error('rname') != "") ? 'is-invalid' : ''; ?>" required>
                <option>--Select Kopi--</option>
                <?php
                if (!empty($kopis)) {
                    foreach ($kopis as $kopi) {
                ?>
                        <option value="<?php echo $kopi['d_id']; ?>">
                            <?php echo set_select('name'); ?>
                            <?php echo $kopi['name']; ?>
                        </option>
                <?php }
                }
                ?>
            </select>
            <?php echo form_error('rname'); ?>
            <span></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stock">Qty</label>
                    <input type="number" class="form-control my-2
                    <?php echo (form_error('stock') != "") ? 'is-invalid' : ''; ?>" id="stock" name="stock" placeholder="Enter stock " value="<?php echo set_value('stock'); ?>">
                    <?php echo form_error('stock'); ?>
                    <span></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-2">Submit</button>
        <a href="<?php echo base_url() . 'home' ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<script>
    const form = document.getElementById('myForm');
    const resname = document.getElementById("resname");
    const kopiname = document.getElementById("stock");

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
        var count = formCon.length - 1;
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
        const stockVal = stock.value.trim();

        if (resnameVal === "--Select toko--") {
            setErrorMsg(resname, 'select toko name');
        } else {
            setSuccessMsg(resname);
        }
        if (kopinameVal === "") {
            setErrorMsg(kopiname, 'kopi name cannot be blank');
        } else {
            setSuccessMsg(kopiname);
        }
        if (stockVal === "") {
            setErrorMsg(stock, 'stock cannot be blank');
        } else {
            setSuccessMsg(stock);
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