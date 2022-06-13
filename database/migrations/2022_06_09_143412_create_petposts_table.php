<?php

use App\Models\Petpost;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petposts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->json('healh_status');
            $table->json('petage');
            $table->string('location');
            $table->string('petbreed');
            $table->string('petgender');
            $table->string('petname');
            $table->string('pettype');
            $table->string('petweight');
            $table->enum('status', [Petpost::PUBLISHED, Petpost::REVIEWREQUIRED, Petpost::COMPLETED])
                ->default(Petpost::PUBLISHED);
            $table->text('petdescription');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petposts');
    }
};
