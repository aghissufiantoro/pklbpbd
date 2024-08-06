$(document).ready(function() {
    $('#kecamatan').change(function() {
        var kecamatan = $(this).val();
        $.ajax({
            url: `${BASE_URL}/admin/stock_entry/get_kelurahan_by_kecamatan`,
            type: 'POST',
            data: {kecamatan: kecamatan},
            dataType: 'json',
            success: function(data) {
                $('#kelurahan').empty();
                $('#kelurahan').append('<option value="">--- Pilih Desa ---</option>');
                $.each(data, function(key, value) {
                    $('#kelurahan').append('<option value="'+ value.desa +'">'+ value.desa +'</option>');
                });
                
            }
        });
    });
});