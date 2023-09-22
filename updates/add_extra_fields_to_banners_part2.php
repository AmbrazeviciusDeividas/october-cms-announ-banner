<?php
namespace Tallpro\AnnouncementBar\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * AddExtraFieldsToBannersPart2 Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration {
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::table('tallpro_announcementbar_banners', function (Blueprint $table) {
            $table->string('button_font_size', 200)->nullable();
            $table->string('button_font_weight', 200)->nullable();
            $table->string('button_text', 200)->nullable();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::table('tallpro_announcementbar_banners', function (Blueprint $table) {
            $table->dropColumn([
                'button_font_size',
                'button_font_weight',
                'button_text'
            ]);
        });
    }
};
