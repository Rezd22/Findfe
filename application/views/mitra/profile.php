<link rel="stylesheet" href="<?php echo base_url('assets/css/profile.css'); ?>">
<div class="row">
    <div class="col-md-6">
        <div class="wrapper mt-sm-5">
            <?php if ($this->session->flashdata('success') != "") : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif ?>
            <?php $loggedmitra = $this->session->userdata('mitra'); ?>
            <form action="<?php echo base_url() . 'mitra/profile/edit/' . $loggedmitra['mitra_id'] ?>" method="POST" enctype="multipart/form-data">
                <h4 class="pb-4 border-bottom">Account settings</h4>
                <div class="py-2">
                    <div>
                        <label for="username">Username</label>
                        <input type="text" name="username" class="bg-light form-control <?php echo (form_error('username') != "") ? 'is-invalid' : ''; ?>" value="<?php echo set_value('username', $user['username']); ?>">
                        <?php echo form_error('username'); ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email Address</label>
                            <input type="text" class="bg-light form-control <?php echo (form_error('email') != "") ? 'is-invalid' : ''; ?>" name="email" value="<?php echo set_value('email', $user['email']) ?>">
                            <?php echo form_error('email'); ?>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="img">Sertifikat</label>
                        <input type="file" id="image" name="image" placeholder="Enter Image" class="form-control my-2
                        <?php echo (!empty($errorImageUpload))  ? 'is-invalid' : ''; ?>">
                        <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : ''; ?>
                        <span></span>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <button type="submit" class="btn btn-primary mr-3">Save Changes</button>
                        <a href="<?php echo base_url() . 'mitra/home' ?>" class="btn border button">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="wrapper mt-sm-5">
            <?php if ($this->session->flashdata('pwd_success') != "") : ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('pwd_success'); ?>
                </div>
            <?php endif ?>
            <?php if ($this->session->flashdata('pwd_error') != "") : ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('pwd_error'); ?>
                </div>
            <?php endif ?>
            <?php $loggedmitra = $this->session->userdata('mitra'); ?>
            <form action="<?php echo base_url() . 'mitra/profile/editPassword/' . $loggedmitra['mitra_id'] ?>" method="POST">
                <h4 class="pb-4 border-bottom">Password</h4>
                <div class="py-2">
                    <div>
                        <input type="password" class="bg-light form-control mb-2 <?php echo (form_error('cPassword') != "") ? 'is-invalid' : ''; ?>" name="cPassword" placeholder="Current Password" value="<?php echo set_value('cPassword') ?>">
                        <?php echo form_error('cPassword'); ?>
                    </div>
                    <div>
                        <input type="password" class="bg-light form-control mb-2 <?php echo (form_error('nPassword') != "") ? 'is-invalid' : ''; ?>" name="nPassword" placeholder="New Password" value="<?php echo set_value('nPassword') ?>">
                        <?php echo form_error('nPassword'); ?>
                    </div>
                    <div>
                        <input type="password" class="bg-light form-control mb-2 <?php echo (form_error('nRPassword') != "") ? 'is-invalid' : ''; ?>" name="nRPassword" placeholder="Confirm Password" value="<?php echo set_value('nRPassword') ?>">
                        <?php echo form_error('nRPassword'); ?>
                    </div>
                    <div class="py-3 pb-4 border-bottom">
                        <button type="submit" class="btn btn-primary mr-3 mb-2">Save Changes</button>
                        <a href="<?php echo base_url() . 'mitra/home' ?>" class="btn border button">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const image = document.getElementById("image");

    const isImage = (imageVal) => {
        fType = imageVal.substring(imageVal.indexOf('.') + 1);
        if (fType === "gif" || fType === "jpg" || fType === "png" || fType === "jpeg") {
            return "pass";
        } else {
            return "fail";
        }
    }

    const validate = () => {
        const imageVal = image.value.trim();


        if (imageVal == "") {
            setErrorMsg(image, 'select image');
        } else if (isImage(imageVal) === "fail") {
            setErrorMsg(image, 'file format is not valid');
        } else {
            setSuccessMsg(image);
        }

        successMsg();

    }
</script>