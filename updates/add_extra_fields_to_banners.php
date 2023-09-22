<?php
namespace Tallpro\AnnouncementBar\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * AddExtraFieldsToBanners Migration
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
            $table->string('background_type')->default('single');
            $table->string('banner_gradient_color1')->default('#FF0000');
            $table->string('banner_gradient_color2')->default('#0000FF');
            $table->integer('paddingVertical')->default(10);
            $table->integer('paddingHorizontal')->default(10);
            $table->string('alignment')->default('center'); // Text Alignment
            $table->integer('fontWeight')->default(400);
            $table->integer('fontSize')->default(16);
            $table->string('button_bg_color')->default('#fff');
            $table->string('button_text_color')->default('#000');
            $table->integer('button_spacing_horizontal')->default(10);
            $table->integer('button_spacing_vertical')->default(3);
            $table->integer('button_border_radius')->default(5);
            $table->string('button_url')->default('https://');
            $table->string('name')->default('Banner');
            $table->enum('status', ['active', 'disabled', 'draft'])->default('draft');
            $table->enum('position', ['top_sticky', 'not_sticky', 'bottom_sticky'])->default('not_sticky');
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::table('tallpro_announcementbar_banners', function (Blueprint $table) {
            $table->dropColumn([
                'background_type',
                'banner_color',
                'banner_gradient_color1',
                'banner_gradient_color2',
                'paddingVertical',
                'paddingHorizontal',
                'text',
                'alignment',
                'text_color',
                'fontWeight',
                'fontSize',
                'button_bg_color',
                'button_text_color',
                'button_spacing_horizontal',
                'button_spacing_vertical',
                'button_border_radius',
                'button_url',
                'name',
                'status',
                'position'
            ]);
        });
    }
};
