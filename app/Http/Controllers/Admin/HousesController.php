<?php

namespace App\Http\Controllers\Admin;

use App\DomainService\HouseDomainService;
use App\Entities\Building\House;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\Building\HouseCreateRequest;
use App\Http\Requests\Building\HouseUpdateRequest;
use App\Repositories\Building\HouseRepository;
use App\Validators\Building\HouseValidator;

/**
 * Class HousesController.
 *
 * @package namespace App\Http\Controllers\Building;
 */
class HousesController extends Controller
{
    /**
     * @var HouseRepository
     */
    protected $repository;

    /**
     * @var HouseValidator
     */
    protected $validator;


    protected  $service;
    /**
     * HousesController constructor.
     *
     * @param HouseRepository $repository
     * @param HouseValidator $validator
     */
    public function __construct(HouseRepository $repository, HouseValidator $validator,HouseDomainService $houseDomainService)
    {
        parent::__construct();

        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service = $houseDomainService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $houses = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $houses,
            ]);
        }

        return view('houses.index', compact('houses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HouseCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(HouseCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $house = $this->repository->create($request->all());

            $response = [
                'message' => 'House created.',
                'data'    => $house->toArray(),
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
        $house = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $house,
            ]);
        }

        return view('houses.show', compact('house'));
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
        $house = $this->repository->find($id);

        return view('houses.edit', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HouseUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(HouseUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $house = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'House updated.',
                'data'    => $house->toArray(),
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
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'House deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'House deleted.');
    }
}
