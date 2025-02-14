<?php

    namespace App\Models;

    use Database\Factories\GenreFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class Genre extends Model
    {
        /** @use HasFactory<GenreFactory> */
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         *
         * @var list<string>
         */
        protected $fillable = [
            'name',
            'description'
        ];


        /**
         * Get the books associated with the genre.
         *
         * @return BelongsToMany
         */
        public function books(): BelongsToMany
        {
            return $this->belongsToMany(Book::class)->withTimestamps();
        }
    }
