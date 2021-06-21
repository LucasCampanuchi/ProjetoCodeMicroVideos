<?php

namespace App\Http\Controllers\Api\v1;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\v1\CategoryStoreRequest;
use App\Http\Requests\Category\v1\CategoryUpdateRequest;
use App\Http\Requests\Category\Interfaces\CategoryStoreRequestInterface;
use App\Http\Requests\Category\Interfaces\CategoryUpdateRequestInterface;
use App\Repository\Interfaces\CategoryRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Models\Category;





class CategoryController extends Controller
{
    private $categoryService;

    public function __construct( CategoryServiceInterface  $categoryService)
    {
        $this->categoryService = $categoryService;
        App::bind(CategoryStoreRequestInterface::class, CategoryStoreRequest::class);
        App::bind(CategoryUpdateRequestInterface::class, CategoryUpdateRequest::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->success($this->categoryService->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryStoreRequestInterface $request)
    {
        $category = $this->categoryService->create($request->validated());
        return  response()->success($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($category)
    {
        $recebeValor = Category::find($category);
        if($recebeValor == ""){
            return response()->error('Categoria nao encontrada', 404);
        }
        else{
            return $recebeValor;
        }       
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryUpdateRequestInterface $request, $category)
    {
        try {
            $category = $this->categoryService->update($category, $request->validated());
        } catch (ModelNotFoundException $e) {
            return response()->error('Model not Found', 404);
        }
        return response()->success($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($category)
    {
        try {
            $this->categoryService->delete($category);
        } catch (ModelNotFoundException $e) {
            return response()->error('Model not Found', 404);
            ;
        }
        return response()->noContent();
    }
}
