<?php

use App\Domain\Core\Constants\TableName;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table(TableName::POST, function (Blueprint $table) {
            $table->string('external_link')
                ->nullable()
                ->after('is_external_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(TableName::POST, function (Blueprint $table) {
            $table->dropColumn('external_link');
        });
    }
};
