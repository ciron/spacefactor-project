<?php
/**
 * Created by PhpStorm.
 * Category: My Dell
 * Date: 19-03-2020
 * Time: 10:00 PM
 */


namespace App\Repositories\Backend\Category;


use App\Events\Backend\Category\CategoryPermanentlyDeleted;
use App\Events\Backend\Category\CategoryRestored;

use App\Events\Backend\Category\CategoryUpdated;
use App\Events\Backend\Category\CategoryCreated;
use App\Exceptions\GeneralException;
use App\Models\Category\Category;
use App\Repositories\BaseRepository;
use Composer\DependencyResolver\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryRepository
 */
class CategoryRepository extends BaseRepository
{
    /**
     * CategoryRepository constructor.
     *
     * @param  Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }


    /**
     * @param int $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->model
            ->active()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getInactivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->model
            ->active(false)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param  $data
     *
     * @return Category
     */
    public function create($data): Category
    {
        return DB::transaction(function() use ($data) {

            $catData = [
                'cat_name' => $data->input('cat_name'),
                'type' => $data->input('type'),
                'slug' => strtolower(str_replace([' ','_'],'-',$data->input('cat_name'))).'-'.uniqid(),
                'active' => $data->input('active', 1),

            ];


            if ($file = $data->hasFile('cat_image')) {
                $file = $data->file('cat_image');
                $fileName = time() . '.' . $file->extension();


                $destinationPath = public_path() . '/cat_image/';
                $file->move($destinationPath, $fileName);
                $catData['cat_image'] = $fileName;
            }

            if ($bannerfile = $data->hasFile('banner_image')) {
                $file = $data->file('banner_image');
                $fileName = "banner-".time() . '.' . $file->extension();


                $destinationPath = public_path() . '/cat_banners/';
                $file->move($destinationPath, $fileName);
                $catData['banner_image'] = $fileName;
            }

            $category = $this->model::create($catData);

            if ($category) {

                event(new CategoryCreated($category));
                return $category;
            }

            throw new GeneralException(__('exceptions.backend.access.users.create_error'));
        });
    }

    /**
     * @param Category $category
     * @param array $data
     *
     * @return Category
     * @throws GeneralException
     */
    public function update(Category $category, $data): Category
    {
        $this->checkCategoryByName($category, $data->input('cat_name'));

        return DB::transaction(function() use ($category, $data) {

            $catData = [
                'cat_name' => $data->input('cat_name'),
                'type' => $data->input('type'),
                'active' => $data->input('active', 1),

            ];


            if ($file = $data->hasFile('cat_image')) {
                $file = $data->file('cat_image');
                $fileName = time() . '.' . $file->extension();
                $destinationPath = public_path() . '/cat_image/';
                $file->move($destinationPath, $fileName);
                $catData['cat_image'] = $fileName;
            }


            if ($category->update($catData)) {


                event(new CategoryUpdated($category));

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.access.users.update_error'));
        });
    }


    /**
     * @param Category $category
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return Category
     */
    public function forceDelete(Category $category): Category
    {
        if ($category->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.delete_first'));
        }

        return DB::transaction(function() use ($category) {


            if ($category->forceDelete()) {
                event(new CategoryPermanentlyDeleted($category));

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.access.users.delete_error'));
        });
    }

    /**
     * @param Category $category
     *
     * @throws GeneralException
     * @return Category
     */
    public function restore(Category $category): Category
    {
        if ($category->deleted_at === null) {
            throw new GeneralException(__('exceptions.backend.access.users.cant_restore'));
        }

        if ($category->restore()) {
            event(new CategoryRestored($category));

            return $category;
        }

        throw new GeneralException(__('exceptions.backend.access.users.restore_error'));
    }

    /**
     * @param Category $category
     * @param $cat_name
     * @throws GeneralException
     */
    protected function checkCategoryByName(Category $category, $cat_name): void
    {
        // Figure out if email is not the same and check to see if email exists
        if ($category->cat_name !== $cat_name && $this->model->where('cat_name', '=', $cat_name)->first()) {
            throw new GeneralException(trans('exceptions.backend.access.users.email_error'));
        }
    }
}
