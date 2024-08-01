const BASE_URL = 'http://localhost:8083/bpbd';

document.addEventListener('DOMContentLoaded', function() {
    var pastValue = '';
    
    renderConditionalButton(false);
    
    function addNewDataKejadian() {
        clearForm();
        submitted = false;
        
        const containerForConditionalButton = document.getElementById('conditional-btn');
        const submitButton = `<button type="submit" value="Submit" class="btn btn-primary">Submit</button>`;
        
        containerForConditionalButton.innerHTML = submitButton;
    }
    
    function renderConditionalButton(submitted) {
        console.log('conditional rendering function');
        const containerForConditionalButton = document.getElementById('conditional-btn');
        const submitButton = `<button type="submit" value="Submit" class="btn btn-primary">Submit</button>`;
        const btnAddNewDataKejadian = `<button id="btnAddNewDataKejadian" class="btn btn-primary">Tambah Data Kejadian Baru</button>`;
        
        containerForConditionalButton.innerHTML = submitted ? btnAddNewDataKejadian : submitButton;
        if (submitted) {
            console.log('submitted add event');
            document.getElementById("btnAddNewDataKejadian").addEventListener('click', addNewDataKejadian);
        }
    }
    
    function clearForm() {
        var optionDropDownKejadian = document.getElementById("kejadian").options;
        for (var i = 0; i < optionDropDownKejadian.length; i++) {
            if (optionDropDownKejadian[i].text === "--- Pilih Kejadian ---") {
                optionDropDownKejadian[i].selected = true;
                break;
            }
        }
        var optionDropDownWilayah = document.getElementById("lokasi_kejadian").options;
        for (var i = 0; i < optionDropDownWilayah.length; i++) {
            if (optionDropDownWilayah[i].text === "--- Pilih Lokasi Kejadian ---") {
                optionDropDownWilayah[i].selected = true;
                break;
            }
        }
        
        fetchOptions('kecamatan', '', 'kecamatan_kejadian');
        fetchOptions('desa', '', 'kelurahan_kejadian');
        document.getElementById('addForm').reset();
        
        const targetElement = document.getElementById('main-div');
        const offset = -60;
        
        const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = elementPosition + offset;
        
        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
        
        const partialContainer = document.getElementById('partialContainer');
        partialContainer.innerHTML = "";
    }
    
    function contentChanged() {
        var selectedKecamatan = document.getElementById('select2-kecamatan_kejadian-container');
        console.log(selectedKecamatan.title);
        
        if (selectedKecamatan.title !== '--- Mohon Pilih Kecamatan ---' && selectedKecamatan.title !== pastValue) {
            console.log('Executing fetchOptions');
            fetchExecuted = true;
            pastValue = selectedKecamatan.title;
            fetchOptions('desa', selectedKecamatan.textContent.trim(), 'kelurahan_kejadian');
        } else {
            console.log('Already executed fetchOptions or title is unchanged.');
        }
    }
    
    var myElement = document.getElementById('kecamatan');
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            
            contentChanged();
        });
    });
    observer.observe(myElement, { childList: true, subtree: true });
    
    var id_kejadian_textForm = document.getElementById('id_kejadian');
    var tanggalInput = document.getElementById('tanggal');
    
    function fetchData() {
        console.log('Fetch data triggered with value:', tanggalInput.value);
        if (tanggalInput.value === '') {
            return;
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
        
        function checkForElement() {
            const datePickerContainer = document.querySelector(".datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-bottom");
            if (datePickerContainer) {
                console.log("wuhan");
                datePickerContainer.addEventListener('click', function() {
                    console.log('Date picker clicked');
                    fetchData();
                    clearInterval(checkInterval);
                });
            }
        }
        
        const checkInterval = setInterval(checkForElement, 100);
    });
    
    document.getElementById('lokasi_kejadian').addEventListener('change', function() {
        var wilayah = this.value;
        selected = document.getElementById('select2-kecamatan_kejadian-container');
        console.log(this.value);
        
        fetchOptions('kecamatan', wilayah, 'kecamatan_kejadian');
    });
    
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
        .then(response => response.json())
        .then(data => {
            console.log(data);
            var targetSelect = document.getElementById(targetSelectId);
            targetSelect.innerHTML = '';
            var defaultOption = new Option(`--- Pilih ${capitalizeFirstLetter(dataType)} ---`, '');
            targetSelect.appendChild(defaultOption);
            data.forEach(item => {
                var option = new Option(item.label, item.value);
                targetSelect.appendChild(option);
            });
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengambil data.');
        });
    }
    
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }
    
    
    document.getElementById('kecamatan_kejadian').addEventListener('change', function() {
        getSelectedValueFromSelect2Container('select2-kecamatan_kejadian-container');
    });
    
   
    document.getElementById('addForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = e.target;
        const formData = new FormData(form);
        
        const imageFile = document.getElementById('dokumentasi').files[0];
        if (imageFile) {
            const imageFormData = new FormData();
            imageFormData.append('image', imageFile);
            
            const caseType = ''; // assuming kejadian is the case type selector
            imageFormData.append('case', caseType);
            
            fetch(`${BASE_URL}/admin/data_kejadian/upload_image`, {
                method: 'POST',
                body: imageFormData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    formData.append('image_url', data.image_url);
                    
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
                        
                        renderConditionalButton(true);
                        
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
                
                renderConditionalButton(true);
                
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