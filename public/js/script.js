$(function () {
    $('.tampilModalTambah').on('click', function () {
        $('#judulFormModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submint]').html('Tambah Data');
    });

    $('.tampilModalUbah').on('click', function () {
        $('#judulFormModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/php/mvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/php/mvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            
            success: function (data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#asal').val(data.asal);
            }
        });
    });
});



