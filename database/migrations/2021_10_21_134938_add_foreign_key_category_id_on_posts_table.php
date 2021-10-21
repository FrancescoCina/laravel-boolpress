<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;

class AddForeignKeyCategoryIdOnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Definisco nuova colonna sul DB 
            $table->unsignedBigInteger('category_id')->after('id')->nullable();

            // Creo Vincolo
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Droppo il vincolo 
            $table->dropForeign('posts_category_id_foreign');

            // Droppo la colonna sul DB
            $table->dropColumn('category_id');
        });
    }
}
