<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('destinasis', function (Blueprint $table) {
            $table->boolean('featured')->default(false)->after('location');
            $table->index('featured');
        });
    }

    public function down()
    {
        Schema::table('destinasis', function (Blueprint $table) {
            $table->dropColumn('featured');
        });
    }
};