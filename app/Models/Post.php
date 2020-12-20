<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'title',
        'description',
        'content',
        'category_id',
        'thumbnail'
    ];

    public function tags(): belongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category(): belongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function uploadImage(Request $request, $image = null)
    {
        if ($request->hasFile('thumbnail')) {
            if ($image) {
                Storage::delete($image);
            }

            $folder = date('Y-m-d');
            return $request->file('thumbnail')->store('images/' . $folder);
        }

        return null;
    }

    public function getImage(): string
    {
        if (!$this->thumbnail) {
            return asset("no-image.png");
        }

        return asset("uploads/{$this->thumbnail}");
    }
}
