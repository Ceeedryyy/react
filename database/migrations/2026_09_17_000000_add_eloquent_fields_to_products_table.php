<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $needsCategoryId = !Schema::hasColumn('products', 'category_id');
        $needsDescription = !Schema::hasColumn('products', 'description');

        if (!$needsCategoryId && !$needsDescription) {
            return;
        }

        Schema::table('products', function (Blueprint $table) use ($needsCategoryId, $needsDescription) {
            if ($needsCategoryId) {
                $table->foreignId('category_id')
                    ->nullable()
                    ->after('id')
                    ->constrained('categories');
            }

            if ($needsDescription) {
                $table->text('description')
                    ->nullable()
                    ->after('name');
            }
        });
    }

    public function down(): void
    {
        // These columns may have existed before this migration;
        // preserve existing data instead of dropping them.
    }
};
