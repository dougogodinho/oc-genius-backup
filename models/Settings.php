<?php namespace Genius\Backup\Models;

use Model;

/**
 * Settings Model
 */
class Settings extends Model
{

    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'genius_backup_settings';

    public $settingsFields = 'fields.yaml';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'genius_backup_settings';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}