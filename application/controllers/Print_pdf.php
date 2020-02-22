<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    Class Print_pdf extends CI_Controller{
        
        function __construct() {
            parent::__construct();
            $this->load->library('fpdf');
            
            if($this->session->userdata('status') != "login"){
                redirect(base_url());
            }
        }
        
        function index(){
            $pdf = new FPDF('l','mm','A5');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',16);
            // mencetak string 
            $pdf->Cell(190,7,'PonPes Inayatullah',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,6,'NIM',1,0);
            $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
            $pdf->Cell(27,6,'NO HP',1,0);
            $pdf->Cell(25,6,'TANGGAL LHR',1,1);
            $pdf->SetFont('Arial','',10);
            $mahasiswa = $this->db->get('db_Santri')->result();
            foreach ($mahasiswa as $row){
                $pdf->Cell(20,6,$row->id_santri,1,0);
                $pdf->Cell(85,6,$row->nama_santri,1,0);
                $pdf->Cell(27,6,$row->tgl_masuk,1,0);
            }
            $pdf->Output();
        }
    }