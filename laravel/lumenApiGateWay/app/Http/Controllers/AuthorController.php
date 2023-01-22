<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * [The service to consume the authors microservice]
     *
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Return the list of authors
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create one new author
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Show one author
     * @return Illuminate\Http\Response
     */
    public function show($author)
    {

    }

    /**
     * Update one author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {

    }

    /**
     * Delete one author
     * @return Illuminate\Http\Response
     */
    public function destory($author)
    {
        
    }
}