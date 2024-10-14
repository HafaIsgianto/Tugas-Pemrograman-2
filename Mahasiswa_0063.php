<?php

class Mahasiswa {
    private $nama;
    private $nim;
    private $jurusan;
    private $ips = [];
    private $ipk;

    public function __construct($nama, $nim, $jurusan, $ips) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->ips = $ips;
        $this->ipk = $this->hitungIPK();
    }

    public function cetakInfo() {
        echo "Nama: $this->nama<br>";
        echo "NIM: $this->nim<br>";
        echo "Jurusan: $this->jurusan<br>";
        echo "IPK: " . number_format($this->ipk, 2) . "<br>";
    }

    private function hitungIPK() {
        return array_sum($this->ips) / count($this->ips);
    }
}

class MahasiswaSarjana extends Mahasiswa {
    private $judulSkripsi;
    private $tahunSelesai;

    public function __construct($nama, $nim, $jurusan, $ips, $judulSkripsi, $tahunSelesai) {
        parent::__construct($nama, $nim, $jurusan, $ips);
        $this->judulSkripsi = $judulSkripsi;
        $this->tahunSelesai = $tahunSelesai;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Judul Skripsi: $this->judulSkripsi<br>";
        echo "Tahun Penyelesaian: $this->tahunSelesai<br>";
    }
}

class MahasiswaMagister extends Mahasiswa {
    private $judulTesis;
    private $pembimbing;

    public function __construct($nama, $nim, $jurusan, $ips, $judulTesis, $pembimbing) {
        parent::__construct($nama, $nim, $jurusan, $ips);
        $this->judulTesis = $judulTesis;
        $this->pembimbing = $pembimbing;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Judul Tesis: $this->judulTesis<br>";
        echo "Pembimbing: $this->pembimbing<br>";
    }
}

class MahasiswaDoktor extends Mahasiswa {
    private $judulDisertasi;
    private $tanggalSidang;

    public function __construct($nama, $nim, $jurusan, $ips, $judulDisertasi, $tanggalSidang) {
        parent::__construct($nama, $nim, $jurusan, $ips);
        $this->judulDisertasi = $judulDisertasi;
        $this->tanggalSidang = $tanggalSidang;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Judul Disertasi: $this->judulDisertasi<br>";
        echo "Tanggal Sidang: $this->tanggalSidang<br>";
    }
}

class Jurusan {
    private $namaJurusan;
    private $daftarMahasiswa = [];

    public function __construct($namaJurusan) {
        $this->namaJurusan = $namaJurusan;
    }

    public function tambahMahasiswa(Mahasiswa $mhs) {
        $this->daftarMahasiswa[] = $mhs;
    }

    public function cetakDaftarMahasiswa() {
        echo "Daftar Mahasiswa di Jurusan $this->namaJurusan:<br>";
        foreach ($this->daftarMahasiswa as $mahasiswa) {
            $mahasiswa->cetakInfo();
            echo "<br>";
        }
    }
}

$ipsMhs1 = [3.5, 3.6, 3.7, 3.8];
$mhs1 = new MahasiswaSarjana("Hafa Isgianto", "43656", "Sistem Informasi", $ipsMhs1, "Sistem Pakar", 2020);

$ipsMhs2 = [3.8, 3.9, 4.0];
$mhs2 = new MahasiswaMagister("Bagas Sapitri", "35732", "Informatika", $ipsMhs2, "Artificial Intelligence", "Dr. Suharto");

$ipsMhs3 = [3.9, 4.0];
$mhs3 = new MahasiswaDoktor("Wijaya Jati", "15454", "Akuntasi", $ipsMhs3, "Machine Learning Keuangan", "12 Juni 2023");

$jurusanInformatika = new Jurusan("Informatika");
$jurusanInformatika->tambahMahasiswa($mhs1);
$jurusanInformatika->tambahMahasiswa($mhs2);
$jurusanInformatika->tambahMahasiswa($mhs3);

$jurusanInformatika->cetakDaftarMahasiswa();

?>
