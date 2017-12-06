<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode', 'name', 'email', 'password', 'level', 'saldo', 'mothers_name', 'address', 'born', 'profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Aum List Detail
    public function invoice()
    {
        return $this->hasMany(Models\Invoice::class);
    }

    public static function getEnum($column)
    {
        $type = DB::select(DB::raw('SHOW COLUMNS FROM users WHERE Field = "'.$column.'"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = [];
        foreach (explode(',', $matches[1]) as $value) {
            $values[] = trim($value, "'");
        }

        return $values;
    }
}
