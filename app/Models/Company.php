<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $appends =['logo_url'];

    protected $guarded = [];

    protected function getLogoUrlAttribute(){
        $path = asset('storage/companies');

        return  is_null($this->logo) ? $path.'/default.png':$path .'/'.$this->logo;
    }


    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
