<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Employee extends Model
{
protected $table ='Employee';
public $timestamps = false;
protected $fillable =[
'username',
'password',
];
}