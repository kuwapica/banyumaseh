<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class UpdateFeaturedDestinationsSeeder extends Seeder
{
    public function run()
    {
        // Update beberapa destinasi jadi featured
        $destinasiIds = [1, 2, 3, 4];
        
        Destinasi::whereIn('id', $destinasiIds)->update(['featured' => 1]);
        
        echo "Featured destinations updated successfully!\n";
        
        // Show updated data
        $featured = Destinasi::where('featured', 1)->get(['id', 'name', 'featured']);
        echo "Featured destinations:\n";
        foreach($featured as $dest) {
            echo "- {$dest->id}: {$dest->name}\n";
        }
    }
}