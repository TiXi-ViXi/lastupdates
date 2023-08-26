<?php



namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Hospital extends Model
{
    protected $table = '_hospital;';

    protected $fillable = [
        'Name', 'City', 'TotalSeat', 'Phone_No','user_id', 'Password','Hospital_Rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dailystats()
    {
        return $this->hasOne(Hospital::class);
    }
}