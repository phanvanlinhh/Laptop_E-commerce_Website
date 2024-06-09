<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model {

    public $timestamps = false; //set time to false
    protected $fillable = [
        'slider_name', 'slide_image'
    ];
    protected $primaryKey = 'slider_id';
    protected $table = 'tbl_slider';
}
