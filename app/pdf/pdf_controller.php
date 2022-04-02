<?php
    class pdf_controller extends CI_controller{
        public function __construct(){
                parent:: __construct();
                $this->load->library('pdf+libray');
        }
        public function generate_pdf_report(){
            
        }
    }
?>