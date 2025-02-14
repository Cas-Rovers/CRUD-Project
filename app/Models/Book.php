<?php

    namespace App\Models;

    use Database\Factories\BookFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Book extends Model
    {
        /** @use HasFactory<BookFactory> */
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         *
         * @var list<string>
         */
        protected $fillable = [
            'title',
            'description',
            'genre_id',
            'price',
            'stock',
            'published_at'
        ];

        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected function casts(): array
        {
            return [
                'published_at' => 'datetime',
            ];
        }

        /**
         * Get the genres associated with the book.
         *
         * @return HasMany
         */
        public function genres(): HasMany
        {
            return $this->hasMany(Genre::class);
        }

        /**
         * Get the authors associated with the book.
         *
         * @return BelongsToMany
         */
        public function authors(): BelongsToMany
        {
            return $this->belongsToMany(Author::class)->withPivot('contribution_type', 'royalty_percentage',
                'contract_signed_at')->withTimestamps();
        }
    }
