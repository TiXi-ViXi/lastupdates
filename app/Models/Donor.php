<?php



namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Donor extends Model
{
    protected $table = '_donar';

    protected $fillable = [
        'Name', 'Age','Gender', 'City', 'Phone', 'Blood_group',
        'Last_Donation', 'Availability', 'user_id', 'Password',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}