<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {
    
    private $table = 'news';

    public function up()
    {
        Schema::create($this->table, function ($table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('short_text')->nullable();
            $table->text('full_text')->nullable();
            $table->string('image')->nullable();
            $table->boolean('enabled')->default(TRUE);
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
        Schema::dropIfExists($this->table);
    }

}
