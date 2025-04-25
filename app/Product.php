<?php

namespace App;

class Product
{
   public string $nama;
   public string $deskripsi;
   public float $harga;

   public function __construct(string $nama, string $deskripsi, float $harga)
   {
      $this->nama = $nama;
      $this->deskripsi = $deskripsi;
      $this->harga = $harga;
   }

   public function getFormattedPrice(): string
   {
      return 'Rp ' . number_format($this->harga, 0, ',', '.');
   }
}
