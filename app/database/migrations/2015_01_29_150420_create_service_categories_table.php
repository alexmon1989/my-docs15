<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceCategoriesTable extends Migration {

    private $table = 'service_categories';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function ($table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->integer('global_service_category_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('global_service_category_id')
                    ->references('id')
                    ->on('global_service_categories')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
