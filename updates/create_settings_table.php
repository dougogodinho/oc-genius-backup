<?php namespace Genius\Backup\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateSettingsTable extends Migration
{

    public function up()
    {
        Schema::create('genius_backup_settings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('genius_backup_settings');
    }

}
