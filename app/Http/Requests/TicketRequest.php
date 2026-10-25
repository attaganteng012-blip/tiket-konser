<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'band' => 'required|string|max:100',
            'event' => 'required|string|max:150',
            'venue' => 'required|string|max:150',
            'event_date' => 'required|date',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => ['required', Rule::in(Ticket::CATEGORIES)],
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string|max:3000',
        ];
    }

    public function attributes(): array
    {
        return ['band' => 'nama konser/band', 'event' => 'nama event', 'venue' => 'lokasi', 'event_date' => 'tanggal & waktu',
            'price' => 'harga', 'stock' => 'stok', 'category' => 'kategori', 'poster' => 'poster', 'description' => 'deskripsi'];
    }
}
