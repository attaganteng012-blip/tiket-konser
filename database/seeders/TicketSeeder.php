<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['MCPR', 'MCPR Big Show 2026', 'Lapangan Basket Senayan, Jakarta', 20, 175000, 500, 'Presale', 'Pesta pop-punk bareng MCPR, lagu-lagu lawas sampai materi terbaru.'],
            ['Rebellion Rose', 'Rose Rebellion Tour', 'GOR Saparua, Bandung', 35, 150000, 300, 'Early Bird', 'Tur punk rock Rebellion Rose, harga spesial gelombang awal.'],
            ['Superman Is Dead (SID)', 'Sunset di Tanah Anarki Tour', 'Lapangan Renon, Denpasar', 50, 750000, 80, 'VIP', 'Area VIP dekat panggung, merchandise eksklusif dan akses meet & greet.'],
            ['Stand Here Alone (SHA)', 'Alone Together Tour', 'Rossi Musik, Jakarta Selatan', 28, 135000, 20, 'General Admission', 'Malam pop-punk intim bersama SHA. Stok hampir habis.'],
            ['Dongker', 'Dongker Fest Vol. 1', 'Lapangan Merdeka, Medan', 65, 125000, 400, 'General Admission', 'Festival punk rock Dongker dengan bintang tamu skena lokal.'],
            ['Romi & The Jahats', 'Jahats Night Out', 'Lokananta, Solo', 42, 100000, 0, 'Presale', 'Presale Romi & The Jahats. Tiket sudah terjual habis.'],
            ['Marjinal', 'Marjinal Anti-Fest', 'Taman Budaya, Yogyakarta', 75, 90000, 600, 'Early Bird', 'Panggung punk jalanan Marjinal, tiket early bird terbatas.'],
        ];

        foreach ($rows as [$band, $event, $venue, $days, $price, $stock, $cat, $desc]) {
            Ticket::create([
                'band' => $band, 'event' => $event, 'venue' => $venue,
                'event_date' => now()->addDays($days)->setTime(19, 0),
                'price' => $price, 'stock' => $stock, 'category' => $cat, 'description' => $desc,
            ]);
        }
    }
}
