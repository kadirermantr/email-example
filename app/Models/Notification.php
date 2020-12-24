<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $fillable = ['name', 'effectiveDate'];

    protected $appends = ['remaining_time'];

    public function getRemainingTimeAttribute()
    {
        $time = $this->effectiveDate;
        $now = Carbon::now();
        Carbon::setLocale('tr');

        $diffTime = Carbon::parse($time)->diffForHumans([
            'parts' => 4,
            'join' => ', ',
        ]);

        if ($time > $now) {
            return $diffTime;
        }

        else {
            return $diffTime . ' önce sona erdi';
        }

    }
}
