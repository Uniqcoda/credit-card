<?php
// trying to create enum for user type
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone', 12);
            $table->date('dob');
            $table->enum('role', UserRolesInterface::ROLES)->default(UserRolesInterface::ROLE_CUSTOMER)->index();
            $table->timestamp('email_verified_at')->nullable();
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
}

interface UserRolesInterface
{
   const ROLE_ADMIN = 'admin';
   const ROLE_CUSTOMER = 'customer';
   const ROLES = [
      self::ROLE_ADMIN,
      self::ROLE_CUSTOMER,
   ];
}
