<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $guarded = [];

    private static $categories = [
        "Electronics",
        "Vehicules",
        "Real Estate",
        "Outfits & style",
        "Fashion Accessories",
        "Computers",
        "Sports and Outdoors",
        "Home and Kitchen",
        "Toys and Games",
        "Beauty and Personal Care",
        "Software",
        "Pet Supplies",
        "Video Games",
        "books"
    ];

    public static function getAllCategories() {
        return static::$categories;
    }

    public static function getCategoriesOptions() {
        $categories_options = [
            '' => trans('categories.default'),
        ];

        foreach (static::$categories as $categorie) {
            $categories_options[$categorie] = trans('categories.' . $categorie);
        }

        return $categories_options;
    }

    private static $locations = [
        "Tunis",
        "Ariana",
        "Ben Arous",
        "Mannouba",
        "Bizerte",
        "Nabeul",
        "Béja",
        "Jendouba",
        "Zaghouan",
        "Siliana",
        "Le Kef",
        "Sousse",
        "Monastir",
        "Mahdia",
        "Kasserine",
        "Sidi Bouzid",
        "Kairouan",
        "Gafsa",
        "Sfax",
        "Gabès",
        "Médenine",
        "Tozeur",
        "Kebili",
        "Ttataouine",
    ];
    public static function getAllLocation() {
        return static::$locations;
    }

    public static function getLocationOptions() {
        $location_options = [
            '' => trans('locations.default'),
        ];

        foreach (static::$locations as $location) {
            $location_options[$location] = trans('locations.' . $location);
        }

        return $location_options;
    }
    
    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function cart(){
        return $this -> belongsTo(Cart::class);
    }

    public function product_image(){
        return $this ->hasMany(ProductImage::class);
    }
    public function orders(){
        return $this ->hasMany(Order::class);
    }
}