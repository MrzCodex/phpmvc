//My Script//
$(function () {
    const url = window.location.href;
    console.log(url.concat(' Link JS AKTIF'));
    //User
    $('.tampilmodaltambah').on('click', function () {
        $('#exampleModalLabel').html('Tambah Data User');
        $('.modal-footer button[type=sumbit]').html('Tambah Data User');
        $('.modal-body form').attr('action', url.concat('/add'));
        $('#password').prop("disabled", false);
        $('#id').val('');
        $('#nama').val('');
        $('#email').val('');
        $('#password').val('');
        $('#gambar_lama').val('');

    });

    $('.tampilmodaledit').on('click', function () {
        $('#exampleModalLabel').html('Edit Data User');
        $('.modal-footer button[type=sumbit]').html('Ubah Data User');
        $('.modal-body form').attr('action', url.concat('/editprogress'));
        $('#password').prop("disabled", true);
        $('#email').prop("disabled", true);


        const id = $(this).data('id');
        $.ajax({
            url: url.concat('/edit'),
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#email').val(data.email);
                $('#password').val(data.password);
                $('#gambar_lama').val(data.gambar_user);
            }
        });
    });

    //Barang
    $('.modalbarangtambah').on('click', function () {
        $('#ModalLabel').html('Tambah Data Barang');
        $('.modal-footer button[type=sumbit]').html('Tambah Data Barang');
        $('.modal-body form').attr('action', url.concat('/add'));
        $('#id').val('');
        $('#nama_barang').val('');
        $('#keterangan').val('');
        $('#harga_modal').val('');
        $('#harga_jual').val('');
        $('#stock').val('');
        $('#sisa').val('');
        $('#gambar_lama').val('');

    });
    $('.modalbarangedit').on('click', function () {
        $('#ModalLabel').html('Edit Data Barang');
        $('.modal-footer button[type=sumbit]').html('Edit Data');
        $('.modal-body form').attr('action', url.concat('/editprogress'));

        const id = $(this).data('id');

        $.ajax({
            url: url.concat('/edit'),
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#nama_barang').val(data.nama_barang);
                $('#keterangan').val(data.keterangan);
                $('#harga_modal').val(data.harga_modal);
                $('#harga_jual').val(data.harga_jual);
                $('#stock').val(data.stock);
                $('#sisa').val(data.sisa);
                $('#gambar_lama').val(data.gambar);
            }
        });
    });
    //Laku
    $('.modaltambahlaku').on('click', function () {
        $('#ModalLabel').html('Tambah Data Laku');
        $('.modal-footer button[type=sumbit]').html('Tambah Data Laku');
        $('.modal-body form').attr('action', url.concat('/add'));
        $('#id').val('');
        $('#qty').val('');
    });
    $('.modaleditlaku').on('click', function () {
        $('#ModalLabel').html('Edit Data Laku');
        $('.modal-footer button[type=sumbit]').html('Edit Data Laku');
        $('.modal-body form').attr('action', url.concat('/editprogress'));
        const id = $(this).data('id');
        $.ajax({
            url: url.concat('/edit'),
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#nama_barang').val(data.id_barang);
                $('#qty').val(data.qty);
            }
        })
    });

});