<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
        public function up()
        {
            Schema::table('comments', function (Blueprint $table) {
                $table->unsignedBigInteger('postId')->after('id');
                $table->unsignedBigInteger('userId')->after('postId');
                $table->foreign('postId')->references('id')->on('posts')->onDelete('cascade');
                $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            });
        }
    
        public function down()
        {
            Schema::table('comments', function (Blueprint $table) {
                $table->dropForeign(['postId']);
                $table->dropForeign(['userId']);
                $table->dropColumn(['postId', 'userId']);
            });
        }
 };
