<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'type')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('type')->unsigned()->default(0);
            });
        }
        if (!Schema::hasColumn('users', 'active')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('active')->default(1);
            });
        }
        if (!Schema::hasColumn('users', 'image')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('image')->nullable();
            });
        }

        $this->seedDatabase();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('active');
            $table->dropColumn('type');
            $table->dropColumn('image');
        });
    }

    private function seedDatabase()
    {
        $adminUser = User::where('type', 1)->first();

        if (!count($adminUser)) {
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'type' => 1,
            ]);
        }
    }
}
