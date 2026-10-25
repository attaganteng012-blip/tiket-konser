<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    const CATEGORIES = ['VIP', 'Presale', 'Early Bird', 'General Admission'];

    protected $fillable = ['band', 'event', 'venue', 'event_date', 'price', 'stock', 'category', 'poster', 'description'];
    protected $casts = ['event_date' => 'datetime'];

    public function scopeSearch($q, $s, $c)
    {
        return $q->when($s, fn ($q) => $q->where(fn ($q) => $q->where('band', 'like', "%$s%")
            ->orWhere('event', 'like', "%$s%")->orWhere('venue', 'like', "%$s%")))
            ->when($c, fn ($q) => $q->where('category', $c));
    }

    public function getPosterUrlAttribute()
    {
        return $this->poster ? asset('storage/' . $this->poster) : null;
    }

    // [label, warna bootstrap]
    public function getStockStatusAttribute()
    {
        return match (true) {
            $this->stock <= 0 => ['Habis', 'danger'],
            $this->stock <= 25 => ['Menipis', 'warning'],
            default => ['Tersedia', 'success'],
        };
    }

    public function getCategoryColorAttribute()
    {
        return ['VIP' => 'danger', 'Presale' => 'primary', 'Early Bird' => 'warning', 'General Admission' => 'success'][$this->category] ?? 'secondary';
    }
}
