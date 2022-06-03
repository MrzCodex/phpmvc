
<h3 class="header-title"><?=$data['title2'];?></h3>
<button type="button" class="btn btn-primary my-3 tampilmodaltambah" data-bs-toggle="modal" data-bs-target="#modaluser">
  Tambah Data User
</button>
<div class="table-responsive">
  
<table class="table table-dark">
<input class="form-control my-2" id="myInput" type="text" placeholder="Search..">
    <tr>
        <th>No .</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Tanggal Daftar</th>
        <th>Tanggal Login</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
  
        <?php $i=0; foreach($data['model'] as $datas):$i +1;$i++;?>
    <tbody id="mytable">
    <tr>
        <td><?=$i;?>.</td>
        <td><?=$datas->nama;?></td>
        <td><?=$datas->email;?></td>
        <td><?=date('d-m-Y (h:i:s)',$datas->date_created);?></td>
        <td><?=date('d-m-Y (h:i:s)',$datas->date_login);?></td>
        <td>
          <?php if(!is_file("../public/assets/img/".$datas->gambar_user)){;?>
             <img src="<?=BASEURL;?>/assets/img/avatar.jpg" width="150">
          <?php }else{;?>
              <img src="<?=BASEURL;?>/assets/img/<?=$datas->gambar_user;?>" width="150">
          <?php };?>
        </td>
        <td>
   
            <form action="<?=BASEURL;?>/user/details" method="post">
                <input type="hidden" name="id" value="<?=$datas->id;?>">
                <button class="btn btn-primary">Details</button>
            </form>
            <div class="mx-1 my-2"></div>
              <button type="button" class="btn btn-warning my-3 tampilmodaledit" data-bs-toggle="modal" data-bs-target="#modaluser" data-id="<?=$datas->id;?>">
                Edit
              </button>
            <div class="mx-1 my-2"></div>
            <?php if($data['session']->id == $datas->id){;?>
            <?php }else{;?>
            <form action="<?=BASEURL;?>/user/delete" method="post">
                <input type="hidden" name="id" value="<?=$datas->id;?>">
                <button class="btn btn-danger">Delete</button>
            </form>
            <?php };?>
        </td>
        </div>
        <?php endforeach;?>
    </tr>
    <tbody>
</table>
</div>



<!-- Modal Tambah User-->
<div class="modal fade" id="modaluser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?=BASEURL;?>/user/add" method="post" enctype="multipart/form-data">
            <label for="nama">Nama</label>
            <input type="hidden" class="form-control" name="id" id="id">
            <input type="text" name="nama" class="form-control" placeholder="Nama" id="nama">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" id="email">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" id="password">
            <label for="gambar">Gambar</label>
            <input type="hidden" name="gambar_lama" class="from-control" id="gambar_lama">
            <input type="file" name="gambar" class="form-control" id="gambar">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
        <button type="sumbit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

