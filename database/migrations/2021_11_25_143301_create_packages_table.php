<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('packagetype_id')->constrained('package_types');
            $table->foreignId('member_id')->constrained('members');
            $table->decimal('weight', 8, 2)->comment('lb');
            $table->foreignId('shipper_id')->constrained('shippers');
            $table->string('status');
            $table->string('tracking_no');
            $table->decimal('estimated_cost', 8, 2)->nullable();
            $table->decimal('actually_cost', 8, 2)->nullable();
            $table->string('invoice')->nullable();
            $table->string('internal_tracking')->nullable();
            $table->date('expected_date')->nullable();
            $table->date('arrival_date')->nullable();
            $table->dateTime('created_at');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
