<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerModel extends Model {

    public $timestamps = false; //set time to false
    protected $fillable = [
        'partner_name', 'partner_image'
    ];
    protected $primaryKey = 'partner_id';
    protected $table = 'tbl_partner';
}
