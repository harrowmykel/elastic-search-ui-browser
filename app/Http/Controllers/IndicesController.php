<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndicesController extends Controller
{
    //

    public function indices(Request $request)
    {
        $indices = json_decode(file_get_contents(ELASTIC_URL . '/_cat/indices?format=json'));
        return view('indices', ['indices' => $indices]);
    }

    public function index(Request $request, string $index)
    {
        $searchResult = json_decode(file_get_contents(ELASTIC_URL . '/' . $index . '/_search?format=json'));

        $hits = [];
        if (isset($searchResult->hits) && isset($searchResult->hits->hits)) {
            $hits = $searchResult->hits->hits;
        }
        return view('index', [
            'search' => $searchResult,
            'hits' => $hits,
            'index_name' => $index,
        ]);
    }
    public function index_type(Request $request, string $index, string $index_type)
    {
        $searchResult = json_decode(file_get_contents(ELASTIC_URL . '/' . $index . '/' . $index_type . '/_search?format=json'));

        $hits = [];
        if (isset($searchResult->hits) && isset($searchResult->hits->hits)) {
            $hits = $searchResult->hits->hits;
        }
        return view('index', [
            'search' => $searchResult,
            'hits' => $hits,
            'index_name' => $index,
        ]);
    }


    public function item(Request $request, string $index, string $index_type, string $id)
    {
        $item = json_decode(file_get_contents(ELASTIC_URL . '/' . $index . '/' . $index_type . '/' . $id . '?format=json'));
        return view('item', [
            'item' => $item,
            'index_name' => $index
        ]);
    }
}
