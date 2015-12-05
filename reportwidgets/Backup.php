<?php

namespace Genius\Backup\ReportWidgets;

use Artisan;
use Backend\Classes\ReportWidgetBase;
use Flash;

class Backup extends ReportWidgetBase
{

    public function render()
    {

        return $this->makePartial('widget');
    }

    public function onBackup ()
    {
        ob_start();
        Artisan::call('storage:clear');
        Artisan::call('cache:clear');
        Artisan::call('backup');
        ob_clean();
        Flash::success('Success!');
    }
}