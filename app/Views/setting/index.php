<h2>Setting</h2>
<div class="col">
    <div class="card">
        <div class ="card-body bg-dark text-white">
            <form action="<?=BASEURL;?>/setting/ubahnama" method="post">
                <label for="name_app">Nama App</label>
                <div class="input-group">
                    <input type="text" name="name_app" id="name_app" placeholder="Nama APP" class="form-control" value="<?=$data['setting'];?>">
                    <button class="btn btn-primary">Ubah Nama App</button>
                </div>
            </form>
        </div>
    </div>
</div>