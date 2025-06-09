<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Destinasi;

class DebugDestinations extends Command
{
    protected $signature = 'debug:destinations';
    protected $description = 'Debug destinations data';

    public function handle()
    {
        $this->info('=== DESTINATION DEBUG ===');
        
        $total = Destinasi::count();
        $this->info("Total destinations: {$total}");
        
        $featured = Destinasi::where('featured', 1)->count();
        $this->info("Featured destinations (1): {$featured}");
        
        $featuredTrue = Destinasi::where('featured', true)->count();
        $this->info("Featured destinations (true): {$featuredTrue}");
        
        $this->info("\n=== ALL DESTINATIONS ===");
        $destinations = Destinasi::select('id', 'name', 'featured')->get();
        
        foreach($destinations as $dest) {
            $this->line("{$dest->id}: {$dest->name} - Featured: {$dest->featured}");
        }
        
        return 0;
    }
}