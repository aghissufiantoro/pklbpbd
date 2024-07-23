
const BASE_URL='http://localhost/bpbd'


document.addEventListener('DOMContentLoaded', function() {
    // Flag to track if fetchOptions has been executed
  
 
  
  
  // Variable to store the previous value of selectedKecamatan.title
  var pastValue = '';
  
  
  renderConditionalButton(false)
  
  function addNewDataKejadian(){
                  clearForm()
                  submitted = false
  
                  const containerForConditionalButton = document.getElementById('conditional-btn')
                  const submitButton = `<button type="submit" value="Submit" class="btn btn-primary" >Submit</button>`
  
                  containerForConditionalButton.innerHTML=submitButton
  
  }
  
  function renderConditionalButton(submitted){
    
  console.log('conditional rendering function')
    const containerForConditionalButton = document.getElementById('conditional-btn')
    const submitButton = `<button type="submit" value="Submit" class="btn btn-primary" >Submit</button>`
    const btnAddNewDataKejadian = `<button id="btnAddNewDataKejadian" class="btn btn-primary"  >Tambah Data Kejadian Baru</button>`
                  
  containerForConditionalButton.innerHTML = submitted ? btnAddNewDataKejadian : submitButton
    if(submitted){
      console.log('submitted add event')
      document.getElementById("btnAddNewDataKejadian").addEventListener('click',addNewDataKejadian)
    }
                  
  
  }
  
  function clearForm (){
  //   document.getElementById('tanggal').value = ''
  //   document.getElementById('id_kejadian').value = ''
  //   document.getElementById('waktu_berita').value = ''
  //   document.getElementById('waktu_berita').value = ''
  //   document.getElementById('waktu_tiba').value = ''
  //   document.getElementById('kronologi').value = ''
  //   document.getElementById('tindak_lanjut').value = ''
  //   document.getElementById('dokumentasi').value = ''
    
  //   document.getElementById('alamat_kejadian').value = ''
    
  
    var optionDropDownKejadian = document.getElementById("kejadian").options;
  for (var i = 0; i < optionDropDownKejadian.length; i++) {
    if (optionDropDownKejadian[i].text == "--- Pilih Kejadian ---") {
      optionDropDownKejadian[i].selected = true;
      break;
    }
  }
    var optionDropDownWilayah = document.getElementById("lokasi_kejadian").options;
  for (var i = 0; i < optionDropDownWilayah.length; i++) {
    if (optionDropDownWilayah[i].text == "--- Pilih Lokasi Kejadian ---") {
      optionDropDownWilayah[i].selected = true;
      break;
    }

  
  
  }
  
  fetchOptions('kecamatan', '', 'kecamatan_kejadian');
  fetchOptions('desa', '', 'kelurahan_kejadian');
  document.getElementById('addForm').reset()
  
  const targetElement = document.getElementById('main-div');
              const offset = -60; // Atur jarak offset di sini (misalnya -50px untuk naik ke atas 50px)
              
              const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
              const offsetPosition = elementPosition + offset;
  
              window.scrollTo({
                  top: offsetPosition,
                  behavior: 'smooth'
              });

  const partialContainer = document.getElementById('partialContainer');
    partialContainer.innerHTML = ""
  }
  
  
  
  // Function to handle content change in 'kecamatan' element
  function contentChanged() {
      var selectedKecamatan = document.getElementById('select2-kecamatan_kejadian-container');
      console.log(selectedKecamatan.title);
  
      // Check if selectedKecamatan has changed and fetchOptions has not been executed
      if (selectedKecamatan.title !== '--- Mohon Pilih Kecamatan ---' && selectedKecamatan.title !== pastValue) {
          console.log('Executing fetchOptions');
          fetchExecuted = true;
          pastValue = selectedKecamatan.title; // Update pastValue
          fetchOptions('desa', selectedKecamatan.textContent.trim(), 'kelurahan_kejadian');
      } else {
          console.log('Already executed fetchOptions or title is unchanged.');
      }
  }
  
  // Add event listener using DOMSubtreeModified (Not recommended, use 'change' event instead)
  var myElement = document.getElementById('kecamatan');
  if (window.addEventListener) {
      // For normal browsers
      myElement.addEventListener('DOMSubtreeModified', contentChanged, false);
  } else if (window.attachEvent) {
      // For IE
      myElement.attachEvent('DOMSubtreeModified', contentChanged);
  }
  
  
  var id_kejadian_textForm = document.getElementById('id_kejadian');
  var tanggalInput = document.getElementById('tanggal');
  
  function fetchData() {
      console.log('Fetch data triggered with value:', tanggalInput.value);
      if(tanggalInput.value ===''){
        return
      }
      var formData = new FormData();
      formData.append('tanggal', tanggalInput.value);
  
      fetch(`${BASE_URL}/admin/data_kejadian/getLastIdKejadianByAjax`, {
          method: 'POST',
          body: formData,
          headers: {
              'X-Requested-With': 'XMLHttpRequest'
          }
      })
      .then(response => response.json())
      .then(data => {
          if (data.error) {
              console.error('Error:', data.error);
              // alert('Terjadi kesalahan: ' + data.error);
          } else {
              console.log('New ID Kejadian:', data.new_id_kejadian);
              id_kejadian_textForm.value = data.new_id_kejadian;
          }
      })
      .catch(error => {
          console.error('Error:', error);
          alert('Terjadi kesalahan saat mengambil data.');
      });
  }
  
  tanggalInput.addEventListener('click', function() {
    console.log('0');
    
    // Function to continuously query the selector until the element is found
    function checkForElement() {
      const datePickerContainer = document.querySelector(".datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-bottom");
      if (datePickerContainer) {
        console.log("wuhan");
        datePickerContainer.addEventListener('click', function() {
          console.log('Date picker clicked');
          fetchData();
          // Clear the interval once the event listener has been added
          clearInterval(checkInterval);
        });
      }
    }
  
    // Set an interval to check for the element every 100 milliseconds
    const checkInterval = setInterval(checkForElement, 100);
  });
  
     
      // Event listener for change on kecamatan_kejadian select
      
      // document.getElementById('select2-kecamatan_kejadian-container').addEventListener('change', function() {
      //     var wilayah = this.value;
          
      //     console.log('aaaa')
      //     console.log(selected)
          
      // });
   
  
  
      document.getElementById('lokasi_kejadian').addEventListener('change', function() {
          var wilayah = this.value;
          selected = document.getElementById('select2-kecamatan_kejadian-container');
          console.log(this.value)
         
          fetchOptions('kecamatan', wilayah, 'kecamatan_kejadian');
      });
  
      // Function to fetch options dynamically based on selected value
      function fetchOptions(dataType, wilayah, targetSelectId) {
      fetch(`${BASE_URL}/admin/data_kejadian/get_daerah`, {
          method: 'POST',
          headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: new URLSearchParams({
              data: dataType,
              wilayah: wilayah
          })
      })
      .then(response => response.json())  // Parse JSON response
      .then(data => {
          console.log(data);
          var targetSelect = document.getElementById(targetSelectId);
          targetSelect.innerHTML = ''; // Clear existing options
          var defaultOption = new Option(`--- Pilih ${capitalizeFirstLetter(dataType)} ---`, '');
          targetSelect.appendChild(defaultOption); // Add default option
          data.forEach(item => {
              var option = new Option(item.label, item.value);
              targetSelect.appendChild(option); // Add fetched options
          });
      })
      .catch((error) => {
          console.error('Error:', error);
          alert('Terjadi kesalahan saat mengambil data.');
      });
  }
  
  
      // Function to capitalize the first letter of a string
      function capitalizeFirstLetter(string) {
          return string.charAt(0).toUpperCase() + string.slice(1);
      }
  
      // Set default value for kabkota_kejadian
      document.getElementById('kabkota_kejadian').value = 'surabaya';
  
      // Function to get selected value from Select2-like container
    //   function getSelectedValueFromSelect2Container(select2ContainerId) {
    //       var container = document.getElementById(select2ontainerId);
    //       if (container) {
    //           var selectedText = container.getAttribute('title') || container.textContent;
    //           console.log('Selected value:', selectedText);
    //           // Optionally, set this selected value to an input field or use it as needed
    //           document.getElementById('selected_kecamatan_value').value = selectedText; // Example: Set to an input field
    //       }
    //   }
  
      // Event listener for change on kecamatan_kejadian to get selected value
      document.getElementById('kecamatan_kejadian').addEventListener('change', function() {
          getSelectedValueFromSelect2Container('select2-kecamatan_kejadian-container');
      });
  
      // Trigger change event to initialize Select2-like behavior (if necessary)
      var event = new Event('change');
      document.getElementById('kabkota_kejadian').dispatchEvent(event);
      
      document.getElementById('addForm').addEventListener('submit', function(e) {
          e.preventDefault();
  
          const form = e.target;
          const formData = new FormData(form);
  
          // Check if an image is selected
          const imageFile = document.getElementById('dokumentasi').files[0];
          if (imageFile) {
              const imageFormData = new FormData();
              imageFormData.append('image', imageFile);
              
              // Add case type to imageFormData
              const caseType = '' // assuming kejadian is the case type selector
              imageFormData.append('case', caseType);
  
              // Upload the image first
              fetch(`${BASE_URL}/admin/data_kejadian/upload_image`, {
                  method: 'POST',
                  body: imageFormData
              })
              .then(response => response.json())
              .then(data => {
                  if (data.status === 'success') {
                      // Add the image URL to the form data
                      formData.append('image_url', data.image_url);
  
                      // Now submit the form with the image URL
                      fetch(form.action, {
                          method: 'POST',
                          body: formData,
                          headers: {
                              'X-Requested-With': 'XMLHttpRequest'
                          }
                      })
                      .then(response => response.text())
                      .then(html => {
                          const partialContainer = document.getElementById('partialContainer');
                          partialContainer.innerHTML = html;
                          
                          renderConditionalButton(true)
                          // Execute any scripts in the newly added HTML
                          const scripts = partialContainer.getElementsByTagName('script');
                          for (let i = 0; i < scripts.length; i++) {
                              const script = document.createElement('script');
                              script.text = scripts[i].text;
                              document.head.appendChild(script).parentNode.removeChild(script);
                          }
                      })
                      .catch(error => {
                          console.error('Error:', error);
                          alert('Terjadi kesalahan saat mengirim data.');
                      });
                  } else {
                      alert('Gagal mengunggah gambar: ' + data.message);
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
                  alert('Terjadi kesalahan saat mengunggah gambar.');
              });
          } else {
              // If no image is selected, just submit the form data
              fetch(form.action, {
                  method: 'POST',
                  body: formData,
                  headers: {
                      'X-Requested-With': 'XMLHttpRequest'
                  }
              })
              .then(response => response.text())
              .then(html => {
                  const partialContainer = document.getElementById('partialContainer');
                  partialContainer.innerHTML = html;
                  renderConditionalButton(true)
                  // Execute any scripts in the newly added HTML
                  const scripts = partialContainer.getElementsByTagName('script');
                  for (let i = 0; i < scripts.length; i++) {
                      const script = document.createElement('script');
                      script.text = scripts[i].text;
                      document.head.appendChild(script).parentNode.removeChild(script);
                  }
                  
               
              })
              .catch(error => {
                  console.error('Error:', error);
                  alert('Terjadi kesalahan saat mengirim data.');
              });
          }
      });
  
  });