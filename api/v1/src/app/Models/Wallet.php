<?php
namespace v1\src\app\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';
    protected $fillable = ['w_user_id', 'w_amount'];
    const CREATED_AT = 'w_created';
    const UPDATED_AT = 'w_last_updated';

}
