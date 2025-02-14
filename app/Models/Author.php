<?php

    namespace App\Models;

    use Database\Factories\AuthorFactory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
            'biography'
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
    }
