// ### tempat semua fungsi di buat

// variable global di modul ini
let currentUrl = window.location.href;
const namaBarang = document.getElementById('kode_barang')
const thisRoutes = {
  edit:'/stock_entry/edit'
}

// fungsi ini digunakan untuk fetching stock barang ketika terjadi perubahan pada drop down barang
const fetchStockOnChange = () =>{
    namaBarang.addEventListener('change', function() {
        fetch(`${BASE_URL}/admin/stock_entry/checkStock`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                kode_barang: this.value
            })
        })
        .then(response => {
            // Check if the response is okay
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            available_stock_global = data.available_stock;
            var targetSelect = document.getElementById('available-stock');
            targetSelect.innerHTML = '';
            var qtyBarang = document.getElementById('qty_barang')
           
            targetSelect.innerHTML = data.available_stock > 0 ? `stock tersedia : ${data.available_stock}` : 'stock kosong';
            
            if(data.available_stock > 0){
              qtyBarang.value = 1
            }else{
              qtyBarang.value = 0
        
            }
        
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengambil data.');
        });
        console.log(this.value);
        });
}

// init stock adalah mengambil stock awal dari barang ketika terjadi proses edit
const initStock = ()=>{
        fetch(`${BASE_URL}/admin/stock_entry/checkStock`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                kode_barang: namaBarang.value
            })
        })
        .then(response => {
            // Check if the response is okay
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            available_stock_global = data.available_stock;
            var targetSelect = document.getElementById('available-stock');
            
            targetSelect.innerHTML = data.available_stock > 0 ? `stock tersedia : ${data.available_stock}` : 'stock kosong';
        
            }).catch((error) => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengambil data.');
        });
        console.log(this.value);
       

}
// dimana fungsi dijalankan
document.addEventListener('DOMContentLoaded',()=>{
    

if(currentUrl.includes(thisRoutes.edit)){
    initStock()
}
fetchStockOnChange()

})

