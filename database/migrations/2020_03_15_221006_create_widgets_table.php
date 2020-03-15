<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->unique();
            $table->timestamps();
        });

        Schema::create('tag_widget', function (Blueprint $table) {
            $table->bigInteger('widget_id');
            $table->bigInteger('tag_id');
            $table->primary(['widget_id', 'tag_id']);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('widgets');
        Schema::dropIfExists('widgets_tags');
    }
}
