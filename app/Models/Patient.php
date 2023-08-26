<?php



namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Patient extends Model
{
    protected $table = '_patient';

    protected $fillable = [
        'Name', 'Age', 'gender', 'City', 'Phone_No', 'Blood_Group', 'Current_Platelet',
        'Lowest_Platelet', 'Hospital', 'user_id', 'rating', 'Password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}