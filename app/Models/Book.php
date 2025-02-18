<?php

    namespace App\Models;

    use Database\Factories\BookFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    /**
     * Book Model
     *
     * Represents a book entity with attributes like title, description, price, stock, and published date.
     * A book can be associated with many genres and authors through many-to-many relationships.
     */
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
            'price',
            'stock',
            'published_at',
        ];

        /**
         * Get the genres associated with the book.
         *
         * @return BelongsToMany
         */
        public function genres(): BelongsToMany
        {
            return $this->belongsToMany(Genre::class)->withTimestamps();
        }

        /**
         * Get the authors associated with the book.
         *
         * @return BelongsToMany
         */
        public function authors(): BelongsToMany
        {
            return $this->belongsToMany(Author::class)->withPivot('contribution_type', 'royalty_percentage', 'contract_signed_at')->withTimestamps();
        }
    }
