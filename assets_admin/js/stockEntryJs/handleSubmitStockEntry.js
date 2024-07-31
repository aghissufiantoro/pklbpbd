

const clearAllForm = () =>{
    var fields = [
          'tanggal_entry',
          'lokasi_diterima',
          'kejadian',
          'id_kejadian',
          'kecamatan',
          'kelurahan',
          'penerima_barang',
          'kode_barang',
          'status_barang',
          'qty_barang',
          'keterangan_barang'
      ];
       arrayBarangSementara = []
      // Kosongkan nilai field-field tersebut
      fields.forEach(function(fieldId) {
          document.getElementById(fieldId).value = '';
      });
      document.getElementById('tabelBarangSementara').innerHTML = ''
  }
  
  const kejadian = document.getElementById('kejadian');
     
  kejadian.addEventListener('change',function(){
        filterIDKejadian('kejadian',this.value,document.getElementById('tanggal_entry').value , 'id_kejadian')
  })
  
  
    
      const id_kejadian_textForm = document.getElementById('id_kejadian');
      const tanggalEntry = document.getElementById('datePickerExample');
  
      document.getElementById('btnSubmit').addEventListener('click',handleBatchPost)
  
      function handleBatchPost(e) {
      e.preventDefault();
      fetch(`${BASE_URL}/admin/stock_entry/save_stock_entry`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(arrayBarangSementara)
      })
      .then(response => response.text())
      .then(data => {
        let jsonObjects = [];
  
      try {
          // Try to parse as a single JSON object
          jsonObjects.push(JSON.parse(data));
      } catch (error) {
          // If parsing as a single JSON object fails, handle as multiple concatenated JSON objects
          let jsonStrings = data.split('}{').map((str, index, array) => {
              if (index === 0) {
                  // First element, add closing brace at the end
                  return str + '}';
              } else if (index === array.length - 1) {
                  // Last element, add opening brace at the start
                  return '{' + str;
              } else {
                  // Middle elements, add both braces
                  return '{' + str + '}';
              }
          });
  
          // Parse each JSON string
          jsonObjects = jsonStrings.map(str => JSON.parse(str));
      }
  
      // Handle each parsed object
      jsonObjects.forEach(jsonObject => {
          let flash = document.getElementById('flash');
          if (jsonObject.status !== 'success') {
              flash.innerText = 'Data gagal dikirim';
          } else {
              flash.innerText = 'Data berhasil dikirim';
              clearAllForm(); // Assuming clearAllForm is a function that clears the form
          }
      });
  
      })
      .catch((error) => {
        console.error('Error:', error);
       
        alert('Terjadi kesalahan saat mengambil data.');
      });
  }
      
      function filterIDKejadian(dataType, search, search2, targetSelectId) {
        console.log(search)
          fetch(`${BASE_URL}/admin/stock_entry/get_filtered_id`, {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded'
              },
              body: new URLSearchParams({
                  data: dataType,
                  search: search,
                  search2: search2 
              })
          })
          .then(response => response.json())
          .then(data => {
             
              var targetSelect = document.getElementById(targetSelectId);
              targetSelect.innerHTML = '';
              var defaultOption
              if(data.length !== 0){
  
                defaultOption = new Option(`--- Pilih ---`, '');
               
               targetSelect.appendChild(defaultOption);
              data.forEach(item => {
                  var option = new Option(item.label, item.value);
                  targetSelect.appendChild(option);
              });
  
              if(document.getElementById('id_kejadian').value === `--- Pilih ---`){
                document.getElementById('id_kejadian').append(defaultOption)
              }
              }else{
                defaultOption = new Option(`--- Tidak Ada Kejadian ---`, '');
                defaultOption2 = new Option(`--- Tidak Ada Kejadian ---`, '');
                const idKejadianOption = document.getElementById('id_kejadian')
                idKejadianOption.innerHTML = ''
                idKejadianOption.appendChild(defaultOption2)
                data.forEach(item => {
                  var option = new Option(item.label, item.value);
                  idKejadianOption.appendChild(option);
                });
                targetSelect.appendChild(defaultOption);
                
                data.forEach(item => {
                    var option = new Option(item.label, item.value);
                    targetSelect.appendChild(option);
                });
  
                console.log('babi')
              }
              
          })
          .catch((error) => {
              console.error('Error:', error);
              alert('Terjadi kesalahan saat mengambil data.');
          });
      }
      
      tanggalEntry.addEventListener('click', function() {
          console.log('0');
          
          function checkForElement() {
              const datePickerContainer = document.querySelector(".datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-bottom");
              if (datePickerContainer) {
                  console.log("wuhan");
                  datePickerContainer.addEventListener('click', function() {
                      console.log('Date picker clicked');
                      filterIDKejadian('tanggal',document.getElementById('tanggal_entry').value,'','kejadian')
                      clearInterval(checkInterval);
                  });
              }
          }
          
          const checkInterval = setInterval(checkForElement, 100);
      });
  
  
  