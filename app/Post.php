<?php

namespace App;

use App\Events\PostCreated;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    protected $dispatchesEvents = [
        'created' => PostCreated::class
    ];

    /**
     * Post belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
    	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
    	return $this->belongsTo(User::class, 'user_id');
    }
}
