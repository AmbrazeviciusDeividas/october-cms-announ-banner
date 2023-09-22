<?php namespace Tallpro\AnnouncementBar\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * AddExtraFieldsToBannersPart3 Migration
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
        Schema::table('tallpro_announcementbar_banners', function (Blueprint $table) {
            $table->string('navigation_class', 200)->nullable();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::table('tallpro_announcementbar_to', function(Blueprint $table) {
            $table->dropColumn('navigation_class');
        });
    }
};
