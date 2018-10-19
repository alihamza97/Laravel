<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class WikiCars extends Model
{



    protected $table = 'wiki_cars';
    protected $hidden = ['userId'];

    public $timestamps = false;

    protected $fillable = [
        'carTitle','description','userId','carImage',
    ];
    public function getCar()
    {
        $WikiCars = WikiCars::all();
        return $WikiCars;
    }
    public function images() {
        return $this->hasMany('carImage');
    }



    //  protected $dateFormat = 'U';
   // public $primaryKey='id';
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
   // const title='carTitle';W


}
