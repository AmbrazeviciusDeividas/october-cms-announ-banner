<?php

namespace Tallpro\AnnouncementBar\Models;

use Model;

class Banner extends Model
{
    protected $table = 'tallpro_announcementbar_banners';

    protected $fillable = [
        'text',
        'banner_color',
        'text_color',
        'background_type',
        'banner_gradient_color1',
        'banner_gradient_color2',
        'paddingVertical',
        'paddingHorizontal',
        'alignment',
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
        'position',
        'button_font_size',
        'button_font_weight',
        'button_text',
        'navigation_class'

    ];
}
