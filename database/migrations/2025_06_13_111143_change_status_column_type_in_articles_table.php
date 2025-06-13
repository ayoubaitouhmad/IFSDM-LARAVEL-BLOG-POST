<?php

use App\Enums\ArticleStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('articles')
            ->where('status', 'published')
            ->update(['status' => ArticleStatus::PUBLISHED->value]);

        DB::table('articles')
            ->where('status', 'draft')
            ->update(['status' => ArticleStatus::DRAFT->value]);

        // Then change the column type
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('status')->unsigned()->default(ArticleStatus::DRAFT->value)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('status')->default('draft')->change();
        });

        // Then update the values back
        DB::table('articles')
            ->where('status', ArticleStatus::PUBLISHED->value)
            ->update(['status' => 'published']);

        DB::table('articles')
            ->where('status', ArticleStatus::DRAFT->value)
            ->update(['status' => 'draft']);
    }
};
