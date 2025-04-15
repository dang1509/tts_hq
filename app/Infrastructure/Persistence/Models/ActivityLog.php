<?php

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Library\Helpers;

class ActivityLog extends BaseModel
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'activity_log';

	/**
	 * The fillable fields for the model.
	 *
	 * @var    array
	 */
    protected $fillable = [
		'shop_id',
		'user_id',
		'prefix',
        'method',
		'url',
		'input',
        'description',
		'ip',
		'user_agent',
	];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public static function add($description="")
    {
        $input=\Request::except(['_token']);
        $encrypt_input=config('activity_log.encrypt_input')??[];
        foreach ($encrypt_input as $item) {
            if(\Request::filled($item)){
                $input[$item]=Helpers::Encrypt($input[$item],config('activity_log.site_secret'));
            }
        }
        $log = [
            'user_id' => auth()->user()->id??null,
            'prefix'    => \Request::route()->getPrefix(),
            'url'    => \Request::fullUrl(),
            'description'   => $description,
            'method'  => \Request::method(),
            'ip'      => \Request::getClientIp(),
            'user_agent'      => \Request::userAgent(),
            'input'   => json_encode($input),
        ];
        return ActivityLog::create($log);
    }
    public static function boot()
    {
        parent::boot();
    }
}
