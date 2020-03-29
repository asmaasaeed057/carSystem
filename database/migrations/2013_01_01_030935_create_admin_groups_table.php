<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->enum('admin_add', ['enable', 'disable'])->default('disable');
            $table->enum('admin_edit', ['enable', 'disable'])->default('disable');
            $table->enum('admin_show', ['enable', 'disable'])->default('disable');
            $table->enum('admin_delete', ['enable', 'disable'])->default('disable');
            $table->enum('admingroup_add', ['enable', 'disable'])->default('disable');
            $table->enum('admingroup_edit', ['enable', 'disable'])->default('disable');
            $table->enum('admingroup_show', ['enable', 'disable'])->default('disable');
            $table->enum('admingroup_delete', ['enable', 'disable'])->default('disable');
            $table->enum('clients_add', ['enable', 'disable'])->default('disable');
            $table->enum('clients_edit', ['enable', 'disable'])->default('disable');
            $table->enum('clients_show', ['enable', 'disable'])->default('disable');
            $table->enum('clients_delete', ['enable', 'disable'])->default('disable');
            $table->enum('account_add', ['enable', 'disable'])->default('disable');
            $table->enum('account_edit', ['enable', 'disable'])->default('disable');
            $table->enum('account_show', ['enable', 'disable'])->default('disable');
            $table->enum('account_delete', ['enable', 'disable'])->default('disable');
            $table->enum('reports_add', ['enable', 'disable'])->default('disable');
            $table->enum('reports_edit', ['enable', 'disable'])->default('disable');
            $table->enum('reports_show', ['enable', 'disable'])->default('disable');
            $table->enum('reports_delete', ['enable', 'disable'])->default('disable');
            $table->enum('companies_add', ['enable', 'disable'])->default('disable');
            $table->enum('companies_edit', ['enable', 'disable'])->default('disable');
            $table->enum('companies_show', ['enable', 'disable'])->default('disable');
            $table->enum('companies_delete', ['enable', 'disable'])->default('disable');
            $table->enum('car_catograys_add', ['enable', 'disable'])->default('disable');
            $table->enum('car_catograys_edit', ['enable', 'disable'])->default('disable');
            $table->enum('car_catograys_show', ['enable', 'disable'])->default('disable');
            $table->enum('car_catograys_delete', ['enable', 'disable'])->default('disable');
            $table->enum('car_types_add', ['enable', 'disable'])->default('disable');
            $table->enum('car_types_edit', ['enable', 'disable'])->default('disable');
            $table->enum('car_types_show', ['enable', 'disable'])->default('disable');
            $table->enum('car_types_delete', ['enable', 'disable'])->default('disable');
            $table->enum('reprair_cards_add', ['enable', 'disable'])->default('disable');
            $table->enum('reprair_cards_edit', ['enable', 'disable'])->default('disable');
            $table->enum('reprair_cards_show', ['enable', 'disable'])->default('disable');
            $table->enum('reprair_cards_delete', ['enable', 'disable'])->default('disable');
            $table->enum('cars_add', ['enable', 'disable'])->default('disable');
            $table->enum('cars_edit', ['enable', 'disable'])->default('disable');
            $table->enum('cars_show', ['enable', 'disable'])->default('disable');
            $table->enum('cars_delete', ['enable', 'disable'])->default('disable');
            $table->enum('box_add', ['enable', 'disable'])->default('disable');
            $table->enum('box_edit', ['enable', 'disable'])->default('disable');
            $table->enum('box_show', ['enable', 'disable'])->default('disable');
            $table->enum('box_delete', ['enable', 'disable'])->default('disable');
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
        Schema::dropIfExists('admin_groups');
    }
}
