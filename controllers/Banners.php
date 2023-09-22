<?php namespace Deividas\AnnouncementBar\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Banners Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Banners extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['tallpro.announcementbar.banners'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Tallpro.AnnouncementBar', 'announcementbar', 'banners');
        $this->addCss('/plugins/deividas/announcementbar-plugin/assets/css/admin.css');
    }
}
