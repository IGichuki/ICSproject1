<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('resume_path')->nullable();
            $table->text('contact_info')->nullable();
            $table->text('company_profile')->nullable(); // for employers
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['resume_path', 'contact_info', 'company_profile']);
        });
    }
};
