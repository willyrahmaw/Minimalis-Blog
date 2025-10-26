<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class UpdatePostsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get admin user
        $admin = User::where('email', 'admin@blog.com')->first();
        
        if ($admin) {
            // Update all posts without user_id to belong to admin
            Post::whereNull('user_id')->update(['user_id' => $admin->id]);
        }
    }
}
