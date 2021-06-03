<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlarmData extends Model
{
    use HasFactory;

    protected $table = 'alarm_datas';

    public $fillable = ['equipment_id', 'alarm_content', 'alarm_time'];
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
