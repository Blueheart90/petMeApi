<?php

use App\Models\AdoptionProcess;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoption_processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('petpost_id');
            $table->enum('status', [AdoptionProcess::REVIEWREQUIRED, AdoptionProcess::REJECTED, AdoptionProcess::COMPLETED])
                ->default(AdoptionProcess::REVIEWREQUIRED);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('petpost_id')->references('id')->on('petposts');

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
        Schema::dropIfExists('adoption_processes');
    }
};
