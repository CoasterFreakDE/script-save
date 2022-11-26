<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Script extends Model
{

    public $table = 'scripts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'script',
        'author_id',
        'category_id',
        'language_id',
        'views',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'views' => 'integer',
        'author_id' => 'integer',
    ];

    /**
     * Get the user that owns the script.
     */
    public function author()
    {
        return User::find($this->author_id);
    }

    /**
     * Get the category that owns the script.
     */
    public function category()
    {
        return Category::find($this->category_id);
    }

    /**
     * Get the language that owns the script.
     */
    public function language()
    {
        return Language::find($this->language_id);
    }
}
