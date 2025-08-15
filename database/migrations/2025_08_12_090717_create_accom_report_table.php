<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accom_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained();
            $table->string('approved_ar_filepath')->nullable();
            $table->string('current_step', length: 20);
            $table->string('status', length: 20);
            $table->text('comments')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('returned_at')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->unsignedBigInteger('president_user_id')->nullable();
            $table->foreign('president_user_id')->references('id')->on('users');
            $table->timestamps();
        });
        DB::statement("
            alter table accom_reports
            add constraint chk_status
            check (status in ('pending', 'returned', 'approved'))
        ");
        DB::statement("
            alter table accom_reports
            add constraint chk_current_step
            check (current_step in ('officers', 'president', 'adviser'))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accom_reports');
    }
};
