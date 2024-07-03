<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// To use reCAPTCHA, you need to sign up for an API key pair for your site.
// link: http://www.google.com/recaptcha/admin
$config['recaptcha_site_key'] = '6Lf0Cc0iAAAAAHO1MmcsQDZaFFp3BYYvluwxO20O';
$config['recaptcha_secret_key'] = '6Lf0Cc0iAAAAAIy_p_m00Kw5-6_mBs93rbqv7DXr';

// $config['recaptcha_site_key'] = '6Le_9cwiAAAAAMuhs29Qyb5hGRIVhEEjg_38dHW0';
// $config['recaptcha_secret_key'] = '6Le_9cwiAAAAAEI8zmddwhMg9Xn7LNChxBhcj8Ui';

// reCAPTCHA supported 40+ languages listed here:
// https://developers.google.com/recaptcha/docs/language
$config['recaptcha_lang'] = 'en';

/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */