<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

    private $table = 'services';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function ($table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('full_text')->nullable();
            $table->integer('service_category_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('service_category_id')
                    ->references('id')
                    ->on('service_categories')
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
