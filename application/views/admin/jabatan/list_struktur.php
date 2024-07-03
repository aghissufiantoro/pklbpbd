<!DOCTYPE html>
<html>

<head>

  <?php $this->load->view('admin/_partials/head') ?>

</head>

<body>

    <div id="wrapper">
      <?php $this->load->view('admin/_partials/navbar') ?>
    

        <div id="page-wrapper" class="gray-bg">
          <?php $this->load->view('admin/_partials/header') ?>
          
            <?php $this->load->view('admin/_partials/jabatan/struktur') ?>
          
          <?php $this->load->view('admin/_partials/footer') ?>

        </div>
    </div>
    
    <div id='Back-to-top'>
      <img alt='Scroll to top' src='<?= base_url('image/backtotop.png') ?>'/>
    </div>

    <?php $this->load->view('admin/_partials/modal') ?>

    <?php $this->load->view('admin/_partials/js') ?>

</body>

</html>