<h1><?=$data['title2'];?></h1>
<div class="card bg-dark">
    <div class="card-body">
        <center>
        <?php if(!is_file('../public/assets/img/'.$data['session']->gambar_user)){;?>
            <img src="<?=BASEURL;?>/assets/img/avatar.jpg" width="150">
        <?php }else{;?>
            <img src="<?=BASEURL;?>/assets/img/<?=$data['session']->gambar_user;?>" width="150">
        <?php };?>
            <p><h5 class="text-white"><?=$data['session']->nama;?></h5></p>
            <p class="text-white"><?=$data['session']->email;?></p>
            <p class="text-white"><?=date('d-m-Y (h:i:s)',$data['session']->date_created);?></p>
        </center>
        <div class="card">
            <div class="card-body text-dark">
                <h4>Setting User</h4>
                <!-- ubah nama profil -->
                <form action="<?=BASEURL;?>/profil/ubahnama" method="post">
                    <input type="hidden" name="id" value="<?=$data['session']->id;?>">
                    <label for="nama">Nama</label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="nama" value="<?=$data['session']->nama;?>" id="nama">
                    <button class="btn btn-primary">Save Name</button>
                    </div>
                </form>
                <form action="<?=BASEURL;?>/profil/ubahfoto" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$data['session']->id;?>">
                    <label for="gambar">Foto Profil</label>
                    <div class="input-group">
                    <input type="file" class="form-control" name="gambar"  id="gambar">
                    <input type="hidden" name="gambar_lama" value="<?=$data['session']->gambar_user;?>">
                    <button class="btn btn-primary">Save Profil</button>
                    <a href="<?=BASEURL;?>/profil/hapusfoto" class="btn btn-danger">Delete Profil</a>
                    </div>
                </form>
                <h4 class="my-2">Security</h4>
                <form action="<?=BASEURL;?>/profil/ubahpassword" method="post">
                    <input type="hidden" name="id" value="<?=$data['session']->id;?>">
                    <label for="password_old">Password Lama</label>
                    <input type="password" class="form-control" name="password_old"  id="password_old">
                    
                    <label for="password_new">Password Baru</label>
                    <input type="password" class="form-control" name="password_new"  id="password_new">
            
                    <button class="btn btn-primary my-2">Save Password</button>

                </form>
            </div>
        </div>
    </div>
</div>