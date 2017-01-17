<?php

namespace Escuccim\Resume\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Job extends Model
{
	protected $fillable = [
			'order',
			'company',
			'position',
			'startdate',
			'enddate',
			'description',
	];
	
	protected $dates = [
		'startdate',
		'enddate',
	];
	
	/**
	 * Take in a query and a string indicating language. If language != all return only results matching lang,
	 * else return all results.
	 * 
	 * @param query $query
	 * @param string $lang
	 */
	public function scopeLanguage($query, $lang){
		if($lang == 'all')
			$query;
		else
			$query->where('lang', $lang);
	}
	
	/**
	 * Format dates as Carbon
	 * 
	 * @param unknown $date
	 * @return \Carbon\Carbon
	 */
	public function getStartDateAttribute($date){
		return new Carbon($date);
	}
	
	public function getEndDateAttribute($date){
		return new Carbon($date);
	}
	
	public function setStartDateAttribute($date){
		$this->attributes['startdate'] = Carbon::parse($date);
	}
	
	public function setEndDateAttribute($date){
		$this->attributes['enddate'] = Carbon::parse($date);
	}
}
