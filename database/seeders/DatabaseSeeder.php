<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

         // CompanyInfor Seeder
        $this->call([
        CompanyInforSeeder::class,
         ]);
        // Advisor Seeder
        $this->call([
        AdvisorSeeder::class,
         ]);
        // Branch Seeder
        $this->call([
        BranchSeeder::class,
         ]);
        // Email Sender Seeder
        $this->call([
        EmailSenderSeeder::class,
         ]);
        // Service Fees Seeder
        $this->call([
        ServiceFeesSeeder::class,
         ]);
        // Template Seeder
        $this->call([
        TemplateSeeder::class,
         ]);
    }
}
