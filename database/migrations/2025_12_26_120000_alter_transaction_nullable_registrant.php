<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('transaction', function (Blueprint $table) {
            $table->dropForeign(['registrant_id']);
            $table->unsignedBigInteger('registrant_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('registrant_id')->nullable(false)->change();
            $table->foreign('registrant_id')->references('id')->on('registrants')->onDelete('cascade');
        });
    }
};
