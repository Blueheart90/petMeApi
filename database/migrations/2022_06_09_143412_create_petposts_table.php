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
            $table->unsignedBigInteger('petbreed_id');
            $table->json('healh_status');
            $table->json('petage');
            $table->string('location');
            $table->enum('petgender', ['M', 'F']);
            $table->string('petname');
            $table->enum('petsize', ['small', 'medium', 'large']);
            $table->enum('status', [Petpost::PUBLISHED, Petpost::REVIEWREQUIRED, Petpost::COMPLETED])
                ->default(Petpost::PUBLISHED);
            $table->text('petdescription');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('petbreed_id')->references('id')->on('petbreeds')->onDelete('cascade');
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
