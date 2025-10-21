<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct(
        protected Service $service
    ) {}

    public function init()
    {
        return view('pages.init');
    }

    public function schedule()
    {
        return view('pages.schedule', [
            'events' => $this->service->getEvents(),
            'searchable' => false
        ]);
    }

    public function movies($event = null)
    {
        return view('pages.movies', [
            'event' => $event,
            'movies' => $this->service->getMovies($event)
        ]);
    }

    public function movie($movie)
    {
        return view('pages.movie', [
            'movie' => $this->service->getMovie($movie)
        ]);
    }

    public function discussionPanels()
    {
        return view('pages.discussion-panels', [
            'panels' => $this->service->getDiscussionPanels(),
            'searchable' => false
        ]);
    }

    public function locations()
    {
        return view('pages.locations', [
            'locations' => $this->service->getLocations(),
            'searchable' => false
        ]);
    }

    public function location($location)
    {
        return view('pages.location', [
            'location' => $this->service->getLocation($location)
        ]);
    }

    public function tickets()
    {
        $tickets = $this->service->getTickets();

        return view('pages.tickets', [
            'tickets' => $tickets,
            'searchable' => false
        ]);
    }

    public function generateTicket(Request $request)
    {
        $code = $this->service->saveTicket($request->array('tickets'));

        return redirect()->route('tickets')->withFragment($code ? '#' . $code : '');
        // Logic to generate a ticket
    }

    public function partners()
    {
        return view('pages.partners', [
            'searchable' => false,
            'partners' => [
                'PARTNER REGIONALNY' => ["https://sciencefilmfestival.pl/wp-content/uploads/2025/10/Malopolska.jpg"],
                'PARTNER GŁÓWNY' => [
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/10/KPT.jpg", 
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/10/ORLEN.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/inPost-1.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/10/LOGO-PKP-1.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/10/PKP_JUBILEUSZOWE.jpg"
                ],
                'PARTNER FESTIWALU' => [
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/Wodociagi-1.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/epec11.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/09/xMalopolska-LOGO-2.jpg.pagespeed.ic.Pyix8y7fVZ.webp",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/10/LOGO_HUAWEI.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/10/Under-Seul.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/08/ZPR_LOGO.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/08/TVP.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/08/VOLVO-3.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/08/Teatr-2.jpg"
                ],
                "PATRONAT HONOROWY" => [
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/08/MON.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/08/MRiT.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/09/MC_LOGO.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/POLSA444.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/09/NASk-2.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/PAN-1.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/UJ-1.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/AGH-3.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/ASP4.jpg"
                ],
                "MEDIA" => [
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/eska-1.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/eska2.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/10/eska-1.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/07/TVP-2-1.jpg",
                    "https://sciencefilmfestival.pl/wp-content/uploads/2025/08/super-expres-2.jpg"
                ]
            ]
        ]);
    }
}
