<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 20);
            $table->string('other_names', 20)->nullable();
            $table->string('first_last_name', 20);
            $table->string('second_last_name', 20)->nullable();

            $table->unsignedInteger('employment_country');
            $table->foreign('employment_country')->references('id')->on('countries');

            $table->unsignedInteger('document_type_id');
            $table->foreign('document_type_id')->references('id')->on('document_types');

            $table->string('number_document', 20)->unique();
            $table->string('email', 300)->unique();
            $table->date('entry_date');

            $table->unsignedInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');

            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('employees');
    }
}
