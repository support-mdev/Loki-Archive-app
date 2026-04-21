<?php

namespace Database\Seeders;


use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run() 
    {
        // User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com'

        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

    //     Listing::create( [
    //     'title' => 'Senior Laravel Developer',
    //     'tags' => 'laravel, php, mysql, redis',
    //     'company' => 'TechSolutions Inc.',
    //     'location' => 'New York, NY (Remote)',
    //     'email' => 'careers@techsolutions.com',
    //     'website' => 'https://techsolutions.com',
    //     'description' => 'We are looking for an experienced Laravel developer to lead our backend team. You will be responsible for building robust APIs, optimizing database queries, and mentoring junior developers. Minimum 5 years experience with Laravel required.'
    // ]);

    // Listing::create(
    // [
    //     'title' => 'Full Stack Engineer',
    //     'tags' => 'react, laravel, tailwind, postgresql',
    //     'company' => 'Digital Innovations LLC',
    //     'location' => 'Austin, TX',
    //     'email' => 'jobs@digitalinnovations.com',
    //     'website' => 'https://digitalinnovations.com',
    //     'description' => 'Join our growing team to build modern web applications. You will work with Laravel backend and React frontend. Experience with Inertia.js is a plus. Great benefits and work-life balance.'
    // ]);
    
    }
}
