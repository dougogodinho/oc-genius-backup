<?php namespace Genius\Backup;

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

    /**
     * Register events and more.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConsoleCommand('genius.backup', 'Genius\Backup\Console\Backup');
    }

    public function registerReportWidgets()
    {
        return [
            ReportWidgets\Backup::class => [
                'label'   => 'Backup',
                'context' => 'dashboard'
            ],
        ];
    }

}
