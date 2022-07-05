<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=>'Laptop Gaming MSI GF65 Thin 10UE-228VN',
                'price'=>'26990000',
                'description'=>'i7-10750H, RTX 3060 6GB, Ram 16GB DDR4, SSD 512GB, 15.6 Inch IPS 144Hz FHD',
                'category'=>'Laptop',
                'gallery'=>'https://bizweb.sapocdn.net/thumb/1024x1024/100/329/122/products/laptop-gaming-msi-gf65-thin-10ue-228vn-1e5ca07b-302a-426f-8a4a-597d76397015.png'
            ],
			[
                'name'=>'Laptop Gaming Asus ROG Strix G15 G513QR-HQ264T',
                'price'=>'40990000',
                'description'=>'Ryzen 9 5900HX, RTX 3070 8GB, Ram 16GB DDR4, SSD 512GB, 15.6 Inch IPS 165Hz WQHD',
                'category'=>'Laptop',
                'gallery'=>'https://bizweb.sapocdn.net/thumb/1024x1024/100/329/122/products/laptop-gaming-asus-rog-strix-g15-g513qr-hq264t.png'
            ],
			[
                'name'=>'SSD Western Digital Green SN350 WDS480G2G0C',
                'price'=>'1290000',
                'description'=>'M.2 NVMe Gen3 x4, Storage 480GB, Read 2400 MB/s, Write 1650 MB/s',
                'category'=>'SSD',
                'gallery'=>'https://bizweb.sapocdn.net/thumb/1024x1024/100/329/122/products/ssd-western-digital-green-sn350-pcie-gen3-x4-nvme-m-2-480gb-wds480g2g0c.png'
            ],
			[
                'name'=>'SSD Samsung 980 MZ-V8V1T0BW',
                'price'=>'2450000',
                'description'=>'M.2 NVMe Gen3 x4, Storage 1TB, Read 3500 MB/s, Write 3000 MB/s',
                'category'=>'SSD',
                'gallery'=>'https://bizweb.sapocdn.net/thumb/1024x1024/100/329/122/products/mz-v8v1t0-01.jpg'
            ],
			[
                'name'=>'Ram Laptop Kingston KVR32S22S8/8',
                'price'=>'830000',
                'description'=>'DDR4, Storage 8GB, Bus 3200MHz, Voltage 1.2v',
                'category'=>'Ram',
                'gallery'=>'https://bizweb.sapocdn.net/thumb/1024x1024/100/329/122/products/ram-laptop-kingston-ddr4-8gb-bus-3200mhz-kvr32s22s8-8.png'
            ],
        ]);
    }
}
