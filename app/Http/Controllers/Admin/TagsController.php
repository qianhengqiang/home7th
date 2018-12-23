<?php

namespace App\Http\Controllers\Admin;

use App\DomainService\TagsDomainService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Repositories\TagRepository;
use App\Validators\TagValidator;

/**
 * Class TagsController.
 *
 * @package namespace App\Http\Controllers;
 */
class TagsController extends Controller
{
    /**
     * @var TagRepository
     */
    protected $repository;

    /**
     * @var TagValidator
     */
    protected $validator;

    protected $service;

    /**
     * TagsController constructor.
     *
     * @param TagRepository $repository
     * @param TagValidator $validator
     */
    public function __construct(TagRepository $repository, TagValidator $validator,TagsDomainService $tagsDomainService)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service = $tagsDomainService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $tags = $this->repository->with(['childrenSystem'])->findByField('parent_id',0);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tags,
            ]);
        }

        return view('tags.index', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TagCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tag = $this->repository->create($request->all());

            $response = [
                'message' => 'Tag created.',
                'data'    => $tag->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tag = $this->repository->with(['parent','children'])->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tag,
            ]);
        }

        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = $this->repository->find($id);

        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TagUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tag = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Tag updated.',
                'data'    => $tag->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);

        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deleted = $this->service->deleteTagById($id);

        if (request()->wantsJson()) {

            return response()->json($deleted);
        }

        return redirect()->back()->with('message', 'Tag deleted.');
    }

    public function belongToUser()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $tags = $this->repository->with(['childrenUsers'])->findByField('parent_id',0);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tags,
            ]);
        }

        return view('tags.index', compact('tags'));
    }
}
