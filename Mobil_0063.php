<?php
class Mobil {
    private $nama;
    private $merk;

    public function __construct($nama, $merk) {
        $this->nama = $nama;
        $this->merk = $merk;
    }

    protected function getNama() {
        return $this->nama;
    }

    protected function getMerk() {
        return $this->merk;
    }

    public function cetakInfo() {
        echo "Nama Mobil: " . $this->getNama() . "<br>";
        echo "Merk Mobil: " . $this->getMerk() . "<br>";
    }
}

class MobilSport extends Mobil {
    private $speed;
    private $turbo;

    public function __construct($nama, $merk, $speed, $turbo) {
        parent::__construct($nama, $merk);
        $this->speed = $speed;
        $this->turbo = $turbo;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Kecepatan: " . $this->speed . " km/h<br>";
        echo "Turbo: " . ($this->turbo ? 'Ya' : 'Tidak') . "<br>";
    }
}

class CityCar extends Mobil {
    private $model;
    private $irit;
    private $sensor;

    public function __construct($nama, $merk, $model, $irit, $sensor) {
        parent::__construct($nama, $merk);
        $this->model = $model;
        $this->irit = $irit;
        $this->sensor = $sensor;
    }

    public function cetakInfo() {
        parent::cetakInfo();
        echo "Model: " . $this->model . "<br>";
        echo "Efisiensi Bahan Bakar: " . $this->irit . "<br>";
        echo "Sensor: " . $this->sensor . "<br>";
    }
}

// Membuat objek
$mobilSport = new MobilSport("Ferrari", "Ferrari", 350, true);
$mobilSport1 = new MobilSport("Lamborghini", "Lamborghini", 320, false);

$cityCar = new CityCar("Avanza", "Avanza", "Yaris", "43 km/l", "Parkir Otomatis");
$cityCar1 = new CityCar("Kijang", "Kijang", "Jazz", "57 km/l", "Lane Assist");

echo "<h2>Mobil Sport:</h2>";
$mobilSport->cetakInfo();
echo "<br>";

echo "<h2>City Car:</h2>";
$cityCar->cetakInfo();
?>
