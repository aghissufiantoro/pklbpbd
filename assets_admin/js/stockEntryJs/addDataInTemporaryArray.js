let namaBarangText 

function checkIfDataExistOnArray (objectBarangSementara){
    arrayBarangSementara.filter((barang)=>{
      if(barang.id === objectBarangSementara){
        barang.qty = objectBarangSementara.qtyBarang
        barang.statusBarang = objectBarangSementara.statusBarang
        return true
      }
    })
}

document.getElementById('kode_barang').addEventListener('change',function(){
  namaBarangText = this.options[this.selectedIndex].text
})
document.getElementById('btnTambahBarang').addEventListener('click', function(){
const tanggalEntry = document.getElementById('tanggal_entry').value
const kategoriKejadian = document.getElementById('kejadian').value
const idKejadian = document.getElementById('id_kejadian').value
const lokasi_diterima = document.getElementById('lokasi_diterima').value
const penerima_barang = document.getElementById('penerima_barang').value
const kecamatan = document.getElementById('kecamatan').value
const kelurahan = document.getElementById('kelurahan').value
const namaBarang = document.getElementById('kode_barang').value

const statusBarang = document.getElementById('status_barang').value
const qtyBarang = document.getElementById('qty_barang').value
const keteranganBarang = document.getElementById('keterangan_barang').value



const tabelBarangSementara = document.getElementById('tabelBarangSementara')



if(!namaBarang||!statusBarang||!qtyBarang||!keteranganBarang
  ||!tanggalEntry||!kategoriKejadian||!idKejadian||!lokasi_diterima
  ||!penerima_barang||!kecamatan||!kelurahan
){
  alert("Tidak Boleh Kosong")
}else{

const objectBarangSementara = {
  tanggalEntry,kategoriKejadian,idKejadian,lokasi_diterima,
  penerima_barang,kecamatan,kelurahan,
  id_barang:namaBarang,
  statusBarang,
  qtyBarang,
  keteranganBarang
}

tabelBarangSementara.firstElementChild.innerText === "No data available in table" ? tabelBarangSementara.firstElementChild.remove() : ''
const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${namaBarangText}</td>
            <td>${statusBarang}</td>
            <td>${qtyBarang}</td>
            <td>${keteranganBarang}</td>
        `;
        tabelBarangSementara.appendChild(newRow);

        arrayBarangSementara.push(objectBarangSementara)
        console.log(arrayBarangSementara);

}

var fields = [
        'kode_barang',
        'status_barang',
        'qty_barang',
        'keterangan_barang'
    ];

    // Kosongkan nilai field-field tersebut
    fields.forEach(function(fieldId) {
        document.getElementById(fieldId).value = '';
    });

});