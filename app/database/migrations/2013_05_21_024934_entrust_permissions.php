<?php
use Illuminate\Database\Migrations\Migration;

class EntrustPermissions extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Creates the permissions table
        Schema::create('permissions', function($table)
        {
            $table->increments('id');
            $table->string('name')->unique();
            // added unique name for oracle
            $table->string('display_name')->unique('permissions_display_name_uniq');
        });

        // Creates the permission_role (Many-to-Many relation) table
        Schema::create('permission_role', function($table)
        {
            $table->increments('id');
            // added index name for oracle support
            $table->integer('permission_id')->unsigned()->index('pr_permission_id_index');
            // added index name for oracle support
            $table->integer('role_id')->unsigned()->index('pr_role_id_index');
            // TODO: check how to properly index 2 fields for oracle
            // $table->unique(array('permission_id','role_id'));
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
    }

}
