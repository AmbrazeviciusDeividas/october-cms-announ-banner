<?php namespace Tallpro\AnnouncementBar;

use Backend;
use System\Classes\PluginBase;
use Tallpro\AnnouncementBar\Components\AnnouncementBar;
use Tallpro\AnnouncementBar\Controllers\Banners;
use Tallpro\AnnouncementBar\Models\Banner;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'AnnouncementBar',
            'description' => 'Announcement bar for your website, make it sticky and dynamic with various stylings',
            'author' => 'Deividas',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        return [
            'stylesheets' => [
                '/plugins/tallpro/announcementbar/assets/css/admin.css'
            ]
        ];
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        \Event::listen('backend.form.extendFields', function (Backend\Widgets\Form $widget) {
            // Ensure you're extending the correct model and controller
            if (!$widget->getController() instanceof Banners ||
                !$widget->model instanceof Banner) {
                return;
            }

            // Adding custom CSS
            \Event::listen('backend.page.beforeDisplay', function($controller, $action, $params) {
                if ($controller instanceof Banners) {
                    $controller->addCss('/plugins/tallpro/announcementbar/assets/css/custom.css');
                }
            });

            // Adding the preview banner to the secondary tabs (so it's on top)
            $widget->addFields([
                'preview_banner' => [
                    'label' => '',
                    'type' => 'partial',
                    'path' => '$/tallpro/announcementbar/partials/_banner_preview.htm',
                    'span' => 'full',
                    'cssClass' => 'preview-banner',
                    'tab' => 'Banner Preview' // this gives it its own tab in the secondary section
                ]
            ], 'secondary');
        });
    }


    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {

        return [
            AnnouncementBar::class => 'announcementBar',
        ];
    }

    public function registerFormWidgets()
    {
        return [
            Backend\FormWidgets\ColorPicker::class => 'colorpicker',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'tallpro.announcementbar.some_permission' => [
                'tab' => 'AnnouncementBar',
                'label' => 'Some permission'
            ],
        ];
    }

    public function registerAssetFiles($controller)
    {
        $controller->addJs('/plugins/tallpro/announcementbar/assets/js/jscolor.js');
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'announcementbar' => [
                'label' => 'Announcement Bar',
                'url' => Backend::url('tallpro/announcementbar/banners'),
                'icon' => 'icon-bullhorn',
                'sideMenu' => [
                    'banners' => [
                        'label' => 'Banners',
                        'icon' => 'icon-copy',
                        'url' => Backend::url('tallpro/announcementbar/banners'),
                    ],
                ],
            ],
        ];
    }

}
