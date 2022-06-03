<h1><?=$data['title3'];?></h1>
<?php $_POST['id'];?>
<div class="card bg-dark text-white">
    <div class="card-body">
        <?php if(!is_file("../public/assets/img/".$data['model']->gambar_user)){echo "Gambar Tidak Ada";}else{;?>
          <img src="<?=BASEURL;?>/assets/img/<?=$data['model']->gambar_user;?>" width="150">
          <?php };?>
        <p>Nama : <?=$data['model']->nama;?></p>
        <p>Email : <?=$data['model']->email;?></p>
        <p>Tanggal Daftar : <?=date('d-m-Y',$data['model']->date_created);?></p>
    </div>
</div>
