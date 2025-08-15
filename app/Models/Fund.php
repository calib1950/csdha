<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fund extends Model
{
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
