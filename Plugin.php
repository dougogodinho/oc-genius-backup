<?php namespace Genius\Backup;

use Genius\Backup\Models\Settings;
use Genius\Backup\ReportWidgets\Backup;
use System\Classes\PluginBase;

/**
 * StorageClear Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'genius.backup::lang.plugin.name',
            'description' => 'genius.backup::lang.plugin.description',
            'author'      => 'Genius',
            'icon'        => 'icon-recycle'
        ];
    }

    public function register()
    {
        $this->registerConsoleCommand('genius.backup', 'Genius\Backup\Console\Backup');
    }

    public function registerReportWidgets()
    {
        return [
            Backup::class => [
                'label'   => 'Backup',
                'context' => 'dashboard'
            ],
        ];
    }

//    public function registerSettings()
//    {
//        return [
//            'settings' => [
//                'label'       => 'genius.backup::lang.settings.label',
//                'description' => 'genius.backup::lang.settings.description',
//                'category'    => 'system::lang.system.categories.system',
//                'icon'        => 'icon-shield',
//                'class'       => Settings::class,
//                'order'       => 1000,
//                'keywords'    => 'security backup',
//                'permissions' => ['backend.manage_preferences']
//            ]
//        ];
//    }
}
