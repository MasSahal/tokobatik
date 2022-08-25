<br>
<br>

<div class="container rounded bg-white mt-5 ">
    <?php if($this->session->flashdata('pesan')){?>
        <div class="alert alert-primary" role="alert">
            <?= $this->session->flashdata('pesan')?>
        </div>
    <?php } ?>
    <form action="<?= base_url('auth/login/edit_proses')?>" method="POST" enctype="multipart/form-data">
     
        <div class="row justify-content-center">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" src="<?= base_url('assets/img/foto/' . $this->session->userdata('foto')) ?>" width="90">
                    <span class="font-weight-bold"><?= $this->session->userdata('nama')?></span> 
                    <span class="text-black-50"><?= $this->session->userdata('email')?></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Edit your profile</h4>
                    </div>
                    <h5 class="text-right">Semua wajib diisi!</h5>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Nama User</label><input type="text" class="form-control" placeholder="Nama Lengkap" value="<?= $this->session->userdata('nama')?>" name="nama"></div>
                        <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" placeholder="Username" value="<?= $this->session->userdata('username')?>" name="username"></div>
                        <div class="col-md-6"><input type="hidden" class="form-control" value="<?= $this->session->userdata('id_buyer')?>" name="id_buyer"></div>
                        
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Foto</label><input type="file" class="form-control" name="photo"></div>
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Email" value="<?= $this->session->userdata('email')?>" name="email"></div>
                        <div class="col-md-12"><label class="labels"> No Handphone</label><input type="text" class="form-control" placeholder="No Handphone" value="<?= $this->session->userdata('no_hp')?>" name="no_hp"></div>
                        <div class="col-md-12"><label class="labels">Alamat</label><input type="widht:400px" class="form-control" placeholder="Alamat Lengkap" value="<?= $this->session->userdata('alamat')?>" name="alamat"></div>
                    </div>
                    <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button">Edit Profile</button></div>
                </div>
            </div>
        </div>
        
    </form>
</div>
