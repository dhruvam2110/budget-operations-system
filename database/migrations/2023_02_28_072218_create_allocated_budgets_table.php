<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocatedBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocated_budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budget_id');
            $table->foreign('budget_id')->references('id')->on('budget_amounts');
            $table->unsignedBigInteger('dep_id');
            $table->foreign('dep_id')->references('id')->on('departments');
            $table->float('budget_allocated', 20, 2);
            $table->float('budget_used', 20, 2)->default('0');
            $table->float('budget_remaining', 20, 2)->nullable();
            $table->boolean('is_active')->default('1');
            $table->softDeletes();
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
        Schema::dropIfExists('allocated_budgets');
    }
}
