<?php

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
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('footnote')->nullable();
            $table->string('address')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('stamp')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('registered_in')->nullable();
            $table->string('regulated_by')->nullable();
            $table->string('regulator_logo')->nullable();
            $table->string('regulation_no')->nullable();
            $table->string('vat')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_infos');
    }
};
