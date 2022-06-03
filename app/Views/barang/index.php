<?php $lib = new Lib();?>
                                <div class="col-12">

                        
            
                                            <h3 class="header-title"><?=$data['title2'];?></h3>
                                            <button type="button" class="btn btn-primary my-3 modalbarangtambah" data-bs-toggle="modal" data-bs-target="#modalbarang">
                                                Tambah Barang
                                            </button>
                                            <input class="form-control my-2" id="myInput" type="text" placeholder="Search..">
                                            <div class="table-responsive">
                                            <table  class="table table-dark" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>Nama Barang</th>
                                                    <th>Keterangan</th>
                                                    <th>Harga Modal</th>
                                                    <th>Harga Jual</th>
                                                    <th>Stock</th>
                                                    <th>Sisa</th>
                                                    <th>Tanggal Upload</th>
                                                    <th>Kasir</th>
                                                    <th>Gambar</th>
                                                    <th>Aksi</th>
                                                
                                                </tr>
                                                </thead>
            
            
                                                <tbody id="mytable">
                                                <tr>
                                                <?php foreach($data['databarang'] as $barang):?>
                                                    <td><?=$barang->nama_barang;?></td>
                                                    <td><?=$barang->keterangan;?></td>
                                                    <td>Rp.<?=$lib->rp($barang->harga_modal);?></td>
                                                    <td>Rp.<?=$lib->rp($barang->harga_jual);?></td>
                                                    <td><?=$barang->stock;?></td>
                                                    <td><?=$barang->sisa;?></td>
                                                    <td><?=date('d-m-y (h:i:s)',$barang->tanggal);?></td>
                                                    <td><?=$barang->nama;?></td>
                                                    <td>
                                                        <?php if(!is_file('../public/assets/img/'.$barang->gambar)){;?>
                                                            <img src="<?=BASEURL;?>/assets/img/avatar.jpg" width="150">
                                                        <?php }else{;?>
                                                            <img src="<?=BASEURL;?>/assets/img/<?=$barang->gambar;?>" width="150">
                                                        <?php };?>
                                                    </td>
                                                    <td>
                                                    <div class="my-2"></div>
                                                    <button type="button" class="btn btn-warning modalbarangedit" data-bs-toggle="modal" data-bs-target="#modalbarang" data-id="<?=$barang->id;?>">
                                                        Edit Barang
                                                    </button>
                                                        <div class="my-2"></div>
                                                        <form action="<?=BASEURL;?>/barang/delete" method="post">
                                                            <input type="hidden" name="id" value="<?=$barang->id;?>">
                                                            <button class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                                
                                                </tbody>
                                            </table>
                                            </div>
                                  
                                </div> <!-- end col -->

<!-- Modal Tambah Barang-->
<div class="modal fade" id="modalbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?=BASEURL;?>/barang/add" method="post" enctype="multipart/form-data">
            <label for="nama_barang">Nama Barang</label>
            <input type="hidden" name="id" id="id">
            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" id="nama_barang">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" id="keterangan">
            <label for="harga_modal">Harga Modal</label>
            <input type="number" name="harga_modal" class="form-control" placeholder="Harga Modal" id="harga_modal">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" placeholder="Harga Jual" id="harga_jual">
            <label for="stock">Stock</label>
            <input type="number" name="stock" class="form-control" placeholder="Stock" id="stock">
            <label for="sisa">Sisa</label>
            <input type="number" name="sisa" class="form-control" placeholder="Sisa" id="sisa">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="gambar">
            <input type="hidden" name="gambar_lama" id="gambar_lama">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="sumbit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>