<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('castings')->insert([
            ['nombre' => 'Spotify', 'director' => 'Los Mumu', 'productora' => ' Rebolución', 'thumbnail' => 'spotify.jpg', 'categoria' => 'small', 'url' => 'https://player.vimeo.com/video/585966059?h=873f7e270b', 'seccion' => 'Castings Comerciales', ],
            ['nombre' => 'Dell', 'director' => 'Patrick Daughters', 'productora' => ' Goodgate', 'thumbnail' => 'dell.jpg', 'categoria' => 'small', 'url' => 'https://player.vimeo.com/video/582126717?h=f141ffee4b', 'seccion' => 'Castings Fotografía', ],
            ['nombre' => 'Virgin Mobile', 'director' => 'Javier Nir & Celina Slava', 'productora' => ' Oruga', 'thumbnail' => 'virgin.jpg', 'categoria' => 'small', 'url' => 'https://player.vimeo.com/video/594668335?h=5a468f9f40', 'seccion' => 'Mini', ],
            ['nombre' => 'Burger King', 'director' => 'Milton Kremer', 'productora' => 'Landia', 'thumbnail' => 'burgerking.jpg', 'categoria' => 'small', 'url' => 'https://player.vimeo.com/video/543231199?h=ed166a1f60', 'seccion' => 'Ficción', ],
            ['nombre' => 'Coca-Cola', 'director' => 'Maxi Blanco', 'productora' => 'Mercado McCann', 'thumbnail' => 'cocacola.jpg', 'categoria' => 'small', 'url' => 'https://player.vimeo.com/video/535020931?h=c5910c9bbb', 'seccion' => 'Castings Fotografía', ],
            ['nombre' => 'ICBC', 'director' => 'Martín Donozo', 'productora' => 'La Doble', 'thumbnail' => 'icbc.jpg', 'categoria' => 'small', 'url' => 'https://player.vimeo.com/video/583400485?h=760f44bdad', 'seccion' => 'Castings Comerciales', ],
        ]);

    }
}
