<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    public $table = "employees";

    public function typeDocument(){
        return $this->hasOne(DocumentTypes::class, 'id', 'document_type_id');
    }

    public function employmentCountry(){
        return $this->hasOne(Countries::class, 'id', 'employment_country');
    }

}
