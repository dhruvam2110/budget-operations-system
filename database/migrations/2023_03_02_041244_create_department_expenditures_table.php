<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_expenditures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dep_id');
            $table->foreign('dep_id')->references('id')->on('allocated_budgets');
            $table->Integer('budget_id')->nullable();
            $table->enum('expense_type', ['Capex', 'Opex', 'Salary']);
            $table->string('item_name')->nullable();
            $table->Integer('quantity')->nullable();
            $table->float('price_per_quantity', 20, 2)->nullable();
            $table->string('service_name')->nullable();
            $table->string('service_start_date')->nullable();
            $table->string('service_end_date')->nullable();
            $table->text('remarks')->nullable();
            $table->enum('month', ['January', 'February', 'March','April', 'May', 'June','July', 'August', 'September','October', 'November', 'December'])->nullable();
            $table->float('expense', 20, 2);
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
        Schema::dropIfExists('department_expenditures');
    }
}
