<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pdf extends CI_Model
{
    // Method untuk mengatur tabel secara dinamis
    public function setTable($tableName)
    {
        $this->table = $tableName;
    }
}
