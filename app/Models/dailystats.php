<?php



namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class dailystats extends Model
{
    protected $table = '_daily_stats_h';

    protected $fillable = [
        'Admitted_Paitents', 'Released_paitents','Daily_Deaths','hospital_id',
    ];

    public function Hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}