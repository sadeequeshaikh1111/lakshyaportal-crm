<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class document_detail extends Model
{
    use HasFactory;
    protected $connection = 'lakshyadb';
    protected $table = 'document_details';
    protected $fillable = [
        'email',
        'category',
        'course',
        'file_name',
        'Verified_Status',
        'Verified_Status',
        'file_path',
    ];

}
