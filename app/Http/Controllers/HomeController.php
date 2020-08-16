<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function list()
    {
        $url = 'https://www.tvnet.lv/rss';
        $xml = simplexml_load_file($url) or die("loading error");
        $source = $xml->channel;
        $items = Array();
        foreach($source->item as $item) {
            $items[] = $item;
        }
        $data = $this->paginate($items);

        return view('list', compact('data', 'source'));
    }

}
