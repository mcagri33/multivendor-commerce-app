<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes,Sluggable;
    protected $fillable = [
        'uuid',
        'category_id',
        'title',
        'keywords',
        'description',
        'detail',
        'price',
        'quantity',
        'minquantity',
        'tax',
        'status'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function sluggableEvent(): string
    {
        /**
         * Default behaviour -- generate slug before model is saved.
         */
        return SluggableObserver::SAVING;

        /**
         * Optional behaviour -- generate slug after model is saved.
         * This will likely become the new default in the next major release.
         */
        return SluggableObserver::SAVED;
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_category','product_id','category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}
