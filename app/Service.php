<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function getEvents() : object
    {
        $tickets = $this->getTickets()->pluck('code')->toArray();

        $events = $this->get('events');

        $events->data = collect($events->data)
            ->transform(function($event) use ($tickets) {
                $event->first_ticket_code = collect($event->tickets)->sortBy(['label', 'date'])->keys()->first();

                $event->tickets = collect($event->tickets)
                    ->reject(function($ticket, $code) use ($tickets) {
                        return in_array($code, $tickets);
                    });

                return $event;
            });

        return $events;
    }

    public function getMovies(?int $event_id = null) : object
    {
        return $this->get(
            'movies' . ($event_id ? '/' . $event_id : ''),
            []
        );
    }

    public function getMovie(int $movie_id) : object
    {
        return $this->get('movie/' . $movie_id);
    }

    public function getDiscussionPanels() : object
    {
        return $this->get('discussion-panels');
    }

    public function getLocations() : object
    {
        return $this->get('locations');
    }

    public function getLocation(int $location_id) : object
    {
        return $this->get('location/' . $location_id);
    }

    public function getTickets() : Collection
    {
        return collect(Storage::json('tickets.json'))->sortBy(['label', 'date']);
    }

    public function saveTicket(array $data) : ?string
    {
        $tickets = $this->getTickets();

        $code = null;
    
        foreach ($data as $json) 
        {
            $ticket = json_decode($json, true);
            $tickets->push($ticket);
            $code = $ticket['code'];
        }

        Storage::put('tickets.json', $tickets->unique('code')->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return $code;
    }

    protected function get(string $endpoint, array $params = []) : object
    {
        return cache()->remember($endpoint . md5(serialize($params)), now()->addMinutes(15), function() use ($endpoint, $params) {
            return Http::withOptions(['verify' => false])->get(config('app.api') . '/' . $endpoint, $params)->object();
        });
    }
}