<?php 
var_dump($_COOKIE);
echo "<hr>";
var_dump(hash('crc32b',$data['session']->id));
?>

<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card bg-dark">
            <div class="card-body bg-dark text-white">
                <div class="text-center">
                        <p class="font-size-16">User</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-primary">
                            <i class="mdi mdi-account text-primary font-size-20"></i>
                        </span>
                    </div>
                    <h5 class="font-size-22  text-white"><?=$data['countuser'];?></h5>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-dark">
            <div class="card-body bg-dark text-white">
                <div class="text-center">
                        <p class="font-size-16">Barang</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-warning">
                            <i class="dripicons-clipboard text-warning font-size-20"></i>
                        </span>
                    </div>
                    <h5 class="font-size-22  text-white"><?=$data['countbarang'];?></h5>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-dark">
            <div class="card-body bg-dark text-white">
                <div class="text-center">
                        <p class="font-size-16">Laku</p>
                    <div class="mini-stat-icon mx-auto mb-4 mt-3">
                        <span class="avatar-title rounded-circle bg-soft-danger">
                            <i class="dripicons-cart text-danger font-size-20"></i>
                        </span>
                    </div>
                    <h5 class="font-size-22  text-white"><?=$data['countlaku'];?></h5>
                </div> 
            </div>
        </div>
    </div>
</div>  <!-- end row -->