<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productImages = [
            [
                'product_id' => 1,
                'path' => 'upload/m400_1569397518.png'
            ],
            [
                'product_id' => 2,
                'path' => 'upload/kirpich_0.jpg'
            ],
            [
                'product_id' => 3,
                'path' => 'upload/pesok.jpg'
            ],
            [
                'product_id' => 4,
                'path' => 'upload/armatura.png'
            ],
            [
                'product_id' => 5,
                'path' => 'upload/gipsokarton.jpg'
            ],
            [
                'product_id' => 6,
                'path' => 'upload/drel_udarnaya_lx_ds_1308_1_v_kor_800_vt_1_skor_25_mm_v_der_wortex_329087.jpg'
            ],
            [
                'product_id' => 7,
                'path' => 'upload/bolgarka-125mm-1550w-wev15-125q-91140-0.jpg'
            ],
            [
                'product_id' => 8,
                'path' => 'upload/1818_ruletka-5-metrov.jpg'
            ],
            [
                'product_id' => 9,
                'path' => 'upload/otvertka-10-IN-1-RATCHET-MULTI-BIT-SCREWDRIVER-UNIVERSAL-48222311-hero-1.jpg'
            ],
            [
                'product_id' => 10,
                'path' => 'upload/molotokhammer1.jpg'
            ],
            [
                'product_id' => 11,
                'path' => 'upload/oboiwallpapers.jpg'
            ],
            [
                'product_id' => 12,
                'path' => 'upload/paingingskraskajpg.jpg'
            ],
            [
                'product_id' => 13,
                'path' => 'upload/dekorkamen.jpg'
            ],
            [
                'product_id' => 14,
                'path' => 'upload/white-led-strip-sealedlentasvetodiod.1.jpg'
            ],
            [
                'product_id' => 15,
                'path' => 'upload/krasivoe-panno-na-stenu-iz-metalla_kupit-v-Lago-Verde.jpg'
            ],
            [
                'product_id' => 16,
                'path' => 'upload/kabel-vvgng-ls-t-3h2.5-1-mp-e1582721389325.jpg'
            ],
            [
                'product_id' => 17,
                'path' => 'upload/rozetkadvoinaya.jpg'
            ],
            [
                'product_id' => 18,
                'path' => 'upload/potolochnyy-svetodiodnyy-svetilnik-gauss-wlf-1-144126350.jpeg'
            ],
            [
                'product_id' => 19,
                'path' => 'upload/lampaled10vt.jpg'
            ],
            [
                'product_id' => 20,
                'path' => 'upload/automaticvykluchatel.jpg'
            ],
            [
                'product_id' => 21,
                'path' => 'upload/kotel.jpg'
            ],
            [
                'product_id' => 22,
                'path' => 'upload/radiator.jpg'
            ],
            [
                'product_id' => 23,
                'path' => 'upload/truba20mm.jpg'
            ],
            [
                'product_id' => 24,
                'path' => 'upload/kupit-smesitel-dlya-vannoj-vanny.jpg'
            ],
            [
                'product_id' => 25,
                'path' => 'upload/dushevayaleyka.jpg'
            ],
            [
                'product_id' => 26,
                'path' => 'upload/2-3-kamery.jpg'
            ],
            [
                'product_id' => 27,
                'path' => 'upload/metaldver.jpg'
            ],
        ];
        DB::table('product_images')->insert($productImages);

        $this->command->info('Product images table seeded successfully.');

    }
}
