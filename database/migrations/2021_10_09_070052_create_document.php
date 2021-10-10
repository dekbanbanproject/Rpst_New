<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('document'))
        {
        Schema::create('document', function (Blueprint $table) {
            $table->bigIncrements('DOC_ID');
            $table->string('DOC_NO')->nullable();  
            $table->string('DOC_NAME')->nullable(); 
            $table->string('DOC_FILE')->nullable(); 
            $table->string('DOC_FILE_NAME')->nullable();
            $table->date('DOC_DATE'); 
            $table->string('DOC_USER_CERIEVE')->nullable(); 
            $table->string('DOC_STORE_ID'); 
            $table->dateTime('created_at', 0);
            $table->dateTime('updated_at', 0);
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document');
    }
}
