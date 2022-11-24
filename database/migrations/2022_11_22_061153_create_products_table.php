<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('title');
            $table->string('slug');
            $table->string('keywords')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('detail')->nullable();
            $table->decimal('price',10,2)->default(0);
            $table->integer('quantity')->nullable();
            $table->integer('minquantity')->nullable();
            $table->integer('tax')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
