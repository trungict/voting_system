<?php

use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\Candidate;

class InitDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            ['name' => 'Best Goalkeeper'],
            ['name' => 'Best Defender'],
            ['name' => 'Best Midfielder'],
            ['name' => 'Best Forward'],
            ['name' => 'Best Player'],
            ['name' => 'Best Young Player'],
        ];

        foreach ($positions as $position) {
            $position = Position::create($position);

            factory(Candidate::class, 10)->create([
                'position_id' => $position->id
            ]);
        }
    }
}
