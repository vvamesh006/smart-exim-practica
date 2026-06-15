<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Cont admin
        User::firstOrCreate(
            ['email' => 'admin@smart-exim.md'],
            ['name' => 'Administrator', 'password' => Hash::make('parola123'), 'role' => 'admin']
        );

        // Sterge produsele si categoriile vechi
        DB::statement('DELETE FROM products');
        DB::statement('DELETE FROM categories');

        // Categorii noi
        $mere = Category::create(['name' => 'Mere', 'slug' => 'mere', 'description' => 'Mere proaspete din livezile noastre.']);
        $cirese = Category::create(['name' => 'Cireșe', 'slug' => 'cirese', 'description' => 'Cireșe dulci, cultivate superintensiv.']);
        $cereale = Category::create(['name' => 'Cereale', 'slug' => 'cereale', 'description' => 'Cereale și culturi de câmp.']);

        // Produse Mere
        $produse = [
            [$mere->id, 'Mere Golden Delicious', 'Mere galben-aurii, dulci și aromate, perfecte pentru consum proaspăt.'],
            [$mere->id, 'Mere Gala', 'Mere crocante, dulci, cu coajă roșu-portocalie, foarte apreciate.'],
            [$mere->id, 'Mere Red Delicious', 'Mere roșii intens colorate, dulci și suculente.'],
            [$mere->id, 'Mere Granny Smith', 'Mere verzi, acrișoare și crocante, ideale pentru gătit și deserturi.'],
            [$mere->id, 'Mere Idared', 'Mere roșii cu gust echilibrat dulce-acrișor, excelente la păstrare.'],

            // Produse Cirese
            [$cirese->id, 'Cireșe Bigarreau', 'Cireșe mari, ferme și dulci, de culoare roșu-închis.'],
            [$cirese->id, 'Cireșe Kordia', 'Cireșe de soi premium, foarte dulci și rezistente la transport.'],
            [$cirese->id, 'Cireșe Regina', 'Cireșe târzii, mari și cărnoase, cu gust intens.'],
            [$cirese->id, 'Cireșe Skeena', 'Cireșe ferme, dulci, ideale pentru export.'],

            // Produse Cereale
            [$cereale->id, 'Grâu', 'Grâu de panificație de înaltă calitate, livrat în vrac.'],
            [$cereale->id, 'Porumb', 'Porumb boabe pentru hrana animalelor și industrie.'],
            [$cereale->id, 'Floarea-soarelui', 'Semințe de floarea-soarelui pentru ulei și procesare.'],
            [$cereale->id, 'Soia', 'Boabe de soia de calitate superioară.'],
        ];

        foreach ($produse as $p) {
            Product::create([
                'category_id' => $p[0],
                'name' => $p[1],
                'description' => $p[2],
                'is_active' => true,
            ]);
        }

        // Servicii (doar daca nu exista deja)
        if (Service::count() == 0) {
            $servicii = [
                ['Comerț cu ridicata', 'Comerț cu ridicata al produselor agricole brute și animalelor vii.', 'truck'],
                ['Intermedieri vânzări', 'Intermedieri pentru vânzarea materiei prime agricole, animalelor vii și textile.', 'handshake'],
                ['Transport rutier de mărfuri', 'Servicii de transport rutier pentru mărfuri pe distanțe scurte și lungi.', 'road'],
                ['Depozitare frigorifică', 'Camere frigorifice moderne pentru păstrarea fructelor în condiții optime.', 'snow'],
                ['Împachetare', 'Servicii de ambalare profesională în cutii de carton de diverse mărimi.', 'box'],
            ];
            foreach ($servicii as $s) {
                Service::create(['title' => $s[0], 'description' => $s[1], 'icon' => $s[2], 'is_active' => true]);
            }
        }
    }
}
