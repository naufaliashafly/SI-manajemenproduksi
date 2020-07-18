<?php

class model_layoutgudang extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('layout_gudang');
    }
}
