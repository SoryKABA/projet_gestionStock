<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Articles extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'code_barre', 'price', 'description', 'slug', 'category_id', 'image', 'quantity', 'peremption'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function whereArticleCodeBarre(int $number)
    {
        return $this->code_barre === $number;
    }

    public function imageArticle()
    {
        return Storage::disk('public')->url($this->image);
    }
}