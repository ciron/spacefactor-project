<?php

namespace App\Http\Controllers\Backend\Category;

use App\Events\Backend\Category\CategoryDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Category\ManageCategoryRequest;
use App\Http\Requests\Backend\Category\StoreCategoryRequest;
use App\Http\Requests\Backend\Category\UpdateCategoryRequest;
use App\Models\Category\Category;
use App\Repositories\Backend\Category\CategoryRepository;

/**
 * Class CategoryController.
 */
class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;


    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;

    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function index(ManageCategoryRequest $request)
    {
        return view('backend.category.index')
            ->withCategorys($this->categoryRepository
                ->orderBy('id')
                ->paginate());
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function create(ManageCategoryRequest $request)
    {
        return view('backend.category.create');
    }

    /**
     * @param  StoreCategoryRequest $request
     *
     * @return mixed
     * @throws \Exception
     * @throws \Throwable
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categoryRepository->create($request);

        return redirect()->route('admin.category.index')->withFlashSuccess(__('alerts.backend.roles.created'));
    }

    /**
     * @param ManageCategoryRequest $request
     * @param Category $category
     *
     * @return mixed
     */
    public function edit(ManageCategoryRequest $request, Category $category)
    {


        return view('backend.category.edit')
            ->withCategory($category);
    }

    /**
     * @param  UpdateCategoryRequest $request
     * @param  Category $category
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->categoryRepository->update($category, $request);

        return redirect()->route('admin.category.index')->withFlashSuccess(__('alerts.backend.roles.updated'));
    }

    public function delete($id)
    {
        $design = Category::find($id);
        $design->delete();
        return redirect()->back();
    }
}
