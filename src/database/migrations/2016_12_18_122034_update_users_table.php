<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('users', function (Blueprint $table) {
	    	$table->integer('type')->unsigned()->default(0);
    		$table->boolean('active')->default(1);
    		$table->string('image')->nullable();
    	});

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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'type' => 1,
        ]);

        DB::table('tags')->insert([
            'name' => 'test',
        ]);

        DB::table('blogs')->insert([
            'user_id' => 1,
            'title' => 'First Post',
            'slug' => 'first-post',
            'body' => 'First post. For test purposes.',
            'published' => 1,
            'published_at' => Carbon::now(),
        ]);

        DB::table('blog_tag')->insert([
            'blog_id' => 1,
            'tag_id' => 1,
        ]);
    }
}
