<?php $lib = new Lib();$totalall = 0;?>
<h3 class="header-title"><?=$data['title2'];?></h3>
<button type="button" class="btn btn-primary my-3 modaltambahlaku" data-bs-toggle="modal" data-bs-target="#modaluser">
  Tambah Data Laku
</button>
<input class="form-control my-2" id="myInput" type="text" placeholder="Search..">
<div class="table-responsive">
    <table class="table table-dark">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Kasir</th>
                <th>Tanggal</th>
                <th>Aksi</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="mytable">
                <?php $i = 0 ;foreach($data['laku'] as $laku):$i +1;$i++;?>
            <tr>
                <td><?=$i;?>.</td>
                <td><?=$laku->nama_barang;?></td>
                <td>Rp. <?=$lib->rp($laku->harga_jual);?></td>
                <td><?=$laku->qty;?></td>
                <td><?=$laku->nama;?></td>
                <td><?=date('d-m-Y (h:i:s)',$laku->tanggal);?></td>
                <td>
                    <button type="button" class="btn btn-warning my-2 modaleditlaku" data-bs-toggle="modal" data-bs-target="#modaluser" data-id="<?=$laku->id;?>">
                        Edit Data Laku
                    </button>
                    <form action="<?=BASEURL;?>/laku/delete" method="post">
                        <input type="hidden" name="id" value="<?=$laku->id;?>">
                        <input type="hidden" name="qty" value="<?=$laku->qty;?>">
                        <input type="hidden" name="id_barang" value="<?=$laku->id_barang;?>">
                        <button type="sumbit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <?php $harga = $laku->harga_jual; $jumlah = $laku->qty ; $total = $harga*$jumlah;$totalall += $total;?>

                    Rp. <?=$lib->rp($total);?>
                </td>
                <?php endforeach;?>
            </tr>
        </tbody>
            <tr>
                <th colspan="7">Total</th>
                <th>Rp. <?=$lib->rp($totalall);?></th>
            </tr>
    </table>
</div>
<!-- Modal Tambah Laku-->
<div class="modal fade" id="modaluser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?=BASEURL;?>/laku/add" method="post" enctype="multipart/form-data">
            <label for="nama">Nama Barang</label>
            <input type="hidden" name="id" id="id">
            <select name="nama_barang" class="form-control" id="nama_barang">
                <?php foreach($data['allbarang'] as $barang):?>
                <option value="<?=$barang->id;?>"><?=$barang->nama_barang;?> (sisa <?=$barang->sisa;?>)</option>
                <?php endforeach;?>
            </select>
            <label for="qty">Jumlah</label>
            <input type="number" name="qty" class="form-control" placeholder="Jumlah" id="qty">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
        <button type="sumbit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>