<div class="vertical-menu">

<div data-simplebar class="h-100">


    <div class="user-sidebar text-center">
        <div class="dropdown">
            <div class="user-img">
                <?php if(!is_file('assets/img/'.$data['session']->gambar_user)){;?>
                    <img src="<?=BASEURL;?>/assets/img/avatar.jpg" alt="" class="rounded-circle">
                <?php }else{;?>
                <img src="<?=BASEURL;?>/assets/img/<?=$data['session']->gambar_user;?>" alt="" class="rounded-circle">
                <?php };?>
                <span class="avatar-online bg-success"></span>
            </div>
            <div class="user-info">
                <h5 class="mt-3 font-size-16 text-white"><?=$data['session']->nama;?></h5>
                <span class="font-size-13 text-white-50">Administrator</span>
            </div>
        </div>
    </div>



    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="<?=BASEURL;?>/home" class="waves-effect">
                    <i class="dripicons-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="dripicons-clipboard"></i>
                    <span>Barang</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="<?=BASEURL;?>/barang">Barang Semua <span class="badge rounded-pill bg-info float-end"><?=$data['countbarang'];?></span></a></a>
                     
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="dripicons-cart"></i>
                    <span>Laku</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="<?=BASEURL;?>/laku">Laku <span class="badge rounded-pill bg-info float-end"><?=$data['countlaku'];?></span></a></li>   
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="dripicons-user-group"></i>
                    <span>User</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="<?=BASEURL;?>/user">All User <span class="badge rounded-pill bg-info float-end"><?=$data['countuser'];?></span></a>
                        <ul>
                        <?php if(isset($_POST['id'])):?>
                    <li><a href="<?=BASEURL;?>/user/details">Details</a></li>
                    <?php endif;?>
                        </ul>
                    </li>
                    
                </ul>
            </li>

            <!-- <li class="menu-title">Extras</li> -->


        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>