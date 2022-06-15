<?php

namespace Database\Seeders;

use App\Models\Pettype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PettypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pettype::create([
            'name' => 'Dog',
            'description' => 'Mamífero doméstico de la familia de los cánidos , de tamaño , forma y pelaje muy diversos , según las razas , que tiene olfato muy fino y es inteligente y muy leal a su dueño',
        ]);
        Pettype::create([
            'name' => 'Cat',
            'description' => 'Con fama de independientes y poco apegados a sus cuidadores, lo cierto es que los gatos son unos excelentes compañeros para cualquier hogar. Pueden ser tan cariñosos como los perros',
        ]);
        Pettype::create([
            'name' => 'Bird',
            'description' => 'Estos animales son muy inteligentes y tienen una gran capacidad para aprender cosas nuevas, incluso algunas de ellas como los loros, son capaces de aprender algunas palabras a través de la repetición.',
        ]);
    }
}
