<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Define the table name (optional if not the plural form of the model name)
    protected $table = 'feedback';

    // Define the fillable attributes
    protected $fillable = [
        'user_id',  // The user who submitted the feedback
        'feedback', // The feedback content
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
