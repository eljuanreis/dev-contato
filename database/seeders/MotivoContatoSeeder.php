<?php

namespace Database\Seeders;

use App\Models\MotivoContato;
use Illuminate\Database\Seeder;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //criando campos pro relacionamento
        MotivoContato::updateOrCreate(['motivo_contato_text' => 'Conversa sobre trabalho']);
        MotivoContato::updateOrCreate(['motivo_contato_text' => 'Reclamação']);
        MotivoContato::updateOrCreate(['motivo_contato_text' => 'Sugestão']);
    }
}
