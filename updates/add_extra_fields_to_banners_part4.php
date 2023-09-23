<?php namespace Deividas\AnnouncementBar\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * AddExtraFieldsToBannersPart4 Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::table('tallpro_announcementbar_banners', function(Blueprint $table) {
            $table->string('button_enabled', 100)->nullable();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::table('tallpro_announcementbar_banners', function(Blueprint $table) {
            $table->dropColumn('button_enabled');
        });
    }
};
