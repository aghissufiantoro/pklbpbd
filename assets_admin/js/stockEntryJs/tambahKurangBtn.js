document.addEventListener("DOMContentLoaded", function() {
    
    const tambahBtn = document.getElementById("tambahBtn");
    const kurangBtn = document.getElementById("kurangBtn");
    const jmlBrgInput = document.getElementById("qty_barang");

 

    tambahBtn.addEventListener("click", function() {
        incrementValue();
    });

    kurangBtn.addEventListener("click", function() {
        decrementValue();
    });

    function incrementValue() {
        let currentValue = parseInt(jmlBrgInput.value);
        console.log(available_stock_global)
        let avail_stock_number = parseInt(available_stock_global)
        console.log(avail_stock_number)
        if(document.getElementById('status_barang').value === 'masuk'){

          if (!isNaN(currentValue)) {
              jmlBrgInput.value = currentValue + 1;
          } else {
              jmlBrgInput.value = 1;
          }
          
        }else{
          if (!isNaN(currentValue) && parseInt(currentValue) < avail_stock_number    ) {
              
              jmlBrgInput.value = currentValue + 1;
          } else {
            
              jmlBrgInput.value = 1;
          }
        }
    }

    function decrementValue() {
        let currentValue = parseInt(jmlBrgInput.value);
        if (!isNaN(currentValue) && currentValue > 1) {
            jmlBrgInput.value = currentValue - 1;
        } else {
            jmlBrgInput.value = 1;
        }
    }

    // Memastikan input hanya menerima angka
    jmlBrgInput.addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});