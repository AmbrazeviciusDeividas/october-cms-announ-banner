<?php

namespace Deividas\AnnouncementBar\Components;

use Cms\Classes\ComponentBase;
use Deividas\AnnouncementBar\Models\Banner;

/**
 * StickyBar Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class AnnouncementBar extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Sticky Bar',
            'description' => 'Displays an announcement bar.'
        ];
    }

    public function onRun()
    {
        $selectedBanner = Banner::find($this->property('selectedBanner'));

        if ($selectedBanner) {
            $this->page['text'] = $selectedBanner->text;
            $this->page['banner_color'] = $selectedBanner->banner_color;
            $this->page['text_color'] = $selectedBanner->text_color;
            $this->page['background_type'] = $selectedBanner->background_type;
            $this->page['banner_gradient_color1'] = $selectedBanner->banner_gradient_color1;
            $this->page['banner_gradient_color2'] = $selectedBanner->banner_gradient_color2;
            $this->page['paddingVertical'] = $selectedBanner->paddingVertical;
            $this->page['paddingHorizontal'] = $selectedBanner->paddingHorizontal;
            $this->page['alignment'] = $selectedBanner->alignment;
            $this->page['fontWeight'] = $selectedBanner->fontWeight;
            $this->page['fontSize'] = $selectedBanner->fontSize;
            $this->page['button_bg_color'] = $selectedBanner->button_bg_color;
            $this->page['button_text_color'] = $selectedBanner->button_text_color;
            $this->page['button_spacing_horizontal'] = $selectedBanner->button_spacing_horizontal;
            $this->page['button_spacing_vertical'] = $selectedBanner->button_spacing_vertical;
            $this->page['button_border_radius'] = $selectedBanner->button_border_radius;
            $this->page['button_url'] = $selectedBanner->button_url;
            $this->page['name'] = $selectedBanner->name;
            $this->page['status'] = $selectedBanner->status;
            $this->page['position'] = $selectedBanner->position;

            $this->page['button_font_size'] = $selectedBanner->button_font_size;
            $this->page['button_font_weight'] = $selectedBanner->button_font_weight;
            $this->page['button_text'] = $selectedBanner->button_text;
            $this->page['navigation_class'] = $selectedBanner->navigation_class;
            $this->page['button_enabled'] = $selectedBanner->button_enabled;


        }
    }


    public function defineProperties()
    {
        return [
            'selectedBanner' => [
                'title' => 'Select Banner',
                'type' => 'dropdown',
                'options' => $this->getBannerOptions(),
            ],
        ];
    }

    public function getBannerOptions()
    {
        $banners = Banner::query()->where('status', 'active')->get()->all();
        $options = [];

        foreach ($banners as $banner) {
            $options[$banner->id] = $banner->name;  // Assuming there's a 'name' column in your table for each banner.
        }

        return $options;
    }
}

