<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/22
 * Time: 12:26 PM
 */

namespace App\DomainService;

use App\Entities\Tag;
use App\Repositories\TagRepository;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;

class TagsDomainService
{
    protected $app;

    protected $repository;

    protected $user;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->user = Auth::user();
        $this->repository = $this->app->make(TagRepository::class);
    }

    public function deleteTagById($id)
    {
        $tag = $this->repository->find($id);

        if ($this->user->can('delete',$tag)) {

            if ($tag->children()->count()) {
                return ['code' => 'error', 'message' => '还有子标签，不能删除'];
            } else {
                $tag->delete();
                return ['code' => 'success', 'message' => '标签删除成功'];
            }

        } else {

            return ['code' => 'error', 'message' => '您无权删除这个标签'];

        }
    }
}
