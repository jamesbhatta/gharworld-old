<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('city_id');
            $table->string('address');
            $table->string('property_for');
            $table->integer('price');
            $table->boolean('negotiable')->default(true);
            $table->integer('bedroom')->nullable()->default(0);
            $table->integer('living_room')->nullable()->default(0);
            $table->integer('kitchen')->nullable()->default(0);
            $table->integer('bathroom')->nullable()->default(0);
            $table->text('facilities')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->boolean('published')->nullable()->default(false);
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('properties');
    }
}
