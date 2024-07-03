$(function() {
  'use strict';

  // $.validator.setDefaults({
  //   submitHandler: function() {
  //     alert("submitted!");
  //   }
  // });

  jQuery.validator.addMethod("alphanumeric", function(value, element) {
      return this.optional(element) || /^\s*[a-zA-Z0-9,\s]+\s*$/i.test(value);
  }, "Harap masukkan angka atau huruf");

  jQuery.validator.addMethod("number", function(value, element) {
      return this.optional(element) || /^\s*[0-9]+\s*$/i.test(value);
  }, "Harap masukkan angka");

  $.validator.addMethod("pwcheck", function(value) {
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
    && /[a-z]/.test(value) // has a lowercase letter
    && /\d/.test(value) // has a digit
  });

  $.validator.addMethod("strong_password", function (value, element) {
    let password = value;
    if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&])(.{8,20}$)/.test(password))) {
      return false;
    }
    return true;
  }, function (value, element) {
    let password = $(element).val();
    if (!(/^(.{8,20}$)/.test(password))) {
        return 'Password minimal 8 hingga 20 karakter';
    }
    else if (!(/^(?=.*[A-Z])/.test(password))) {
        return 'Password minimal ada huruf besar';
    }
    else if (!(/^(?=.*[a-z])/.test(password))) {
        return 'Password minimal ada huruf kecil';
    }
    else if (!(/^(?=.*[0-9])/.test(password))) {
        return 'Password minimal ada angka';
    }
    else if (!(/^(?=.*[@#$%&])/.test(password))) {
        return "Password minimal terdiri dari karakter spesial @ # $ % &.";
    }
    return false;
  });

  $(function() {
    // validate signup form on keyup and submit
    $("#addForm").validate({
      rules: {
        nama_survey: {
          alphanumeric: true,
          required: true,
          minlength: 3
        },
        alamat_survey: {
          required: true,
          alphanumeric: true,
          minlength: 5
        },
        prov_survey: {
          required: true
        },
        kota_kab_survey: {
          required: true
        },
        kec_survey: {
          required: true
        },
        kel_survey: {
          required: true
        },
        nilai: {
          required: true
        },
        alasan: {
          alphanumeric: true,
          required: true
        },
        judul_artikel: {
          required: true,
          alphanumeric: true,
          minlength: 5
        },
        jenis_artikel: {
          required: true,
          alphanumeric: true,
          minlength: 5
        },
        instansi_data_pkk: {
          required: true
        },
        jabatan_data_pkk: {
          required: true
        },
        ni_pegawai: {
          required: true,
          number: true,
          minlength: 5
        },
        tmp_lahir_pegawai: {
          required: true,
          alphanumeric: true,
          minlength: 4
        },
        tgl_lahir_pegawai: {
          required: true,
        },
        instansi_pegawai: {
          required: true
        },
        pangkat_pegawai: {
          required: true
        },
        golongan_pegawai: {
          required: true
        },
        jabatan_pegawai: {
          required: true
        },
        plt_pegawai: {
          required: true
        },
        eselon_pegawai: {
          required: true
        },
        nama_pegawai: {
          required: true,
          alphanumeric: true,
          minlength: 3
        },
        telp_pegawai: {
          required: true,
          number: true,
          minlength: 5
        },
        alamat_pegawai: {
          required: true,
          alphanumeric: true,
          minlength: 3
        },
        jk_pegawai: {
          required: true
        },
        tanggungjawab_tugas_harian: {
          required: true
        },
        tgl_tugas_harian: {
          required: true
        },
        jam_tugas_harian: {
          required: true
        },
        no_surat_tugas_harian: {
          required: true
        },
        tempat_tugas_harian: {
          required: true,
          alphanumeric: true
        },
        perihal_tugas_harian: {
          required: true,
          alphanumeric: true
        },
        petugas_tugas_harian: {
          required: true,
          alphanumeric: true
        },
        hasil_tugas_harian: {
          required: true,
          alphanumeric: true
        }, 
        ket_tugas_harian: {
          required: true,
          alphanumeric: true
        },
        jabatan_kontak_opd: {
          required: true,
          alphanumeric: true,
          minlength: 5
        }, 
        nama_kontak_opd: {
          required: true,
          alphanumeric: true,
          minlength: 5
        }, 
        telp_kontak_opd: {
          required: true,
          number: true,
          minlength: 5,
          maxlength: 14
        },
        username: {
          required: true,
          alphanumeric: true,
          minlength: 5,
          maxlength: 20
        }, 
        password: {
          required: true,
          strong_password: true,
          minlength: 8
        }, 
        role: {
          required: true
        }, 
        email: {
          required: true,
          email: true
        }, 
        nama_depan: {
          required: true,
          alphanumeric: true
        }, 
        nama_belakang: {
          required: true,
          alphanumeric: true
        }, 
        no_telp: {
          required: true,
          number: true
        },
        judul_perpus: {
          required: true,
          alphanumeric: true,
          minlength: 5
        },
        jenis_perpus: {
          required: true
        },
        tgl_perpus: {
          required: true
        },
        ket_perpus: {
          required: true,
          alphanumeric: true,
          minlength: 2
        },
        thumbnail_perpus: {
          required: true
        },
        dok_perpus: {
          required: true
        },
        nama_lokasi_pos: {
          alphanumeric: true,
          required: true
        },
        lat_lokasi_pos: {
          required: true
        },
        lon_lokasi_pos: {
          required: true
        },
        kec_lokasi_pos: {
          required: true
        },
        kel_lokasi_pos: {
          required: true
        },
        alamat_lokasi_pos: {
          required: true
        },
        ket_lokasi_pos: {
          required: true
        },
        terms_agree: "required"
      },
      messages: {
        judul_artikel: {
          required: "Masukkan Judul Artikel",
          alphanumeric: "Harap masukkan dengan benar",
          minlength: "Masukkan minimal 5 karakter"
        },
        jenis_artikel: {
          required: "Masukkan Jenis Artikel",
          alphanumeric: "Harap masukkan dengan benar",
          minlength: "Masukkan minimal 5 karakter"
        },
        terms_agree: "Harap setujui jika Anda menyetujuinya"
      },
      errorPlacement: function(error, element) {
        error.addClass( "invalid-feedback" );

        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        }
        else if (element.prop('type') === 'radio' && element.parent('.radio-inline').length) {
          error.insertAfter(element.parent().parent());
        }
        else if (element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
          error.appendTo(element.parent().parent());
        }
        else {
          error.insertAfter(element);
        }
      },
      highlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        }
      },
      unhighlight: function(element, errorClass) {
        if ($(element).prop('type') != 'checkbox' && $(element).prop('type') != 'radio') {
          $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
        }
      }
    });
  });
});