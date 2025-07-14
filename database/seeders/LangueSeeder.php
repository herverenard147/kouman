<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Langue;

class LangueSeeder extends Seeder
{
    public function run(): void
    {
        $langues = [
            ['nom' => 'Français', 'code_iso' => 'fr'],
            ['nom' => 'Anglais', 'code_iso' => 'en'],
            ['nom' => 'Espagnol', 'code_iso' => 'es'],
            ['nom' => 'Allemand', 'code_iso' => 'de'],
        ];

        foreach ($langues as $langue) {
            Langue::updateOrCreate(['code_iso' => $langue['code_iso']], $langue);
        }
    }
}
