<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBoutiqueRequest;
use App\Http\Requests\StoreBoutiqueRequest;
use App\Http\Requests\UpdateBoutiqueRequest;
use App\Models\Boutique;
use App\Models\Category;
use App\Models\Ville;
use Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Admin\BoutiquesController;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Load the page content
        $pageContent = file_get_contents('http://example.com'); // Replace with the actual URL of the page you want to search

        // Search for the query in the page content
        $results = $this->searchWord($query, $pageContent);

        // Pass the results to the view
        return view('search');
    }

    private function searchWord($query, $content)
    {
        $matches = [];

        // Perform a case-insensitive search for the query word
        preg_match_all("/\b$query\b/i", $content, $matches);

        return $matches[0];
    }
    
}
