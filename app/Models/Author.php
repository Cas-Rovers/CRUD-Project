<?php

    namespace App\Models;

    use Database\Factories\AuthorFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    /**
     * Author Model
     *
     * Represents an author entity with attributes like first name, last name, and biography.
     * An author can have many books associated through a many-to-many relationship.
     */
    class Author extends Model
    {
        /** @use HasFactory<AuthorFactory> */
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         *
         * @var list<string>
         */
        protected $fillable = [
            'first_name',
            'last_name',
            'biography',
        ];

        /**
         * Get the authors associated with the book.
         *
         * @return BelongsToMany
         */
        public function books(): BelongsToMany
        {
            return $this->belongsToMany(Book::class)->withPivot('contribution_type', 'royalty_percentage',
                'contract_signed_at')->withTimestamps();
        }

        /**
         * Get the author's full name as a concatenated string of first and last name.
         *
         * @return string The full name of the author.
         */
        public function getFullNameAttribute(): string
        {
            return trim($this->first_name . ' ' . $this->last_name);
        }
    }
