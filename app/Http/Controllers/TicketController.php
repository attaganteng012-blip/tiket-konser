<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::search(request('q'), request('category'))
            ->orderBy('event_date')->paginate(9)->withQueryString();
        $stats = [
            'count' => Ticket::count(),
            'stock' => Ticket::sum('stock'),
            'value' => Ticket::selectRaw('COALESCE(SUM(price * stock), 0) as v')->value('v'),
        ];

        return view('tickets.index', ['tickets' => $tickets, 'stats' => $stats, 'categories' => Ticket::CATEGORIES]);
    }

    public function create()
    {
        return view('tickets.create', ['categories' => Ticket::CATEGORIES]);
    }

    public function store(TicketRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }
        Ticket::create($data);

        return redirect()->route('tickets.index')->with('ok', 'Tiket berhasil ditambahkan.');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', ['ticket' => $ticket, 'categories' => Ticket::CATEGORIES]);
    }

    public function update(TicketRequest $request, Ticket $ticket)
    {
        $data = $request->validated();
        if ($request->hasFile('poster')) {
            if ($ticket->poster) Storage::disk('public')->delete($ticket->poster);
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }
        $ticket->update($data);

        return redirect()->route('tickets.show', $ticket)->with('ok', 'Tiket berhasil diperbarui.');
    }

    public function destroy(Ticket $ticket)
    {
        if ($ticket->poster) Storage::disk('public')->delete($ticket->poster);
        $ticket->delete();

        return redirect()->route('tickets.index')->with('ok', 'Tiket berhasil dihapus.');
    }
}
