<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('age_day');
            $table->integer('age_month');
            $table->integer('age_year');
            $table->string('address');
            $table->integer('phone_number')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('12345678');
            $table->string('role')->nullable()->default(App\Enums\UserRoleEnum::VISITOR);
            $table->string('gender')->nullable();
//            $table->enum('role', ['doctor', 'employee', 'patient'])->default('patient');
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
