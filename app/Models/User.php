<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $table ='user';
protected $fillable = [
'name', 'purpose', 'phone_num','token_num','start_timestamp','end_timestamp'
];
/**
* The attributes excluded from the model's JSON form.
*
* @var array
*/

}