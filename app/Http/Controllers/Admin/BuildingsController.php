<?php

namespace App\Http\Controllers\Admin;

//use App\Entities\Building\BuildingDomainService;
use App\DomainService\BuildingDomainService;
use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\Building\BuildingCreateRequest;
use App\Http\Requests\Building\BuildingUpdateRequest;
use App\Repositories\Building\BuildingRepository;
use App\Validators\Building\BuildingValidator;

/**
 * Class BuildingsController.
 *
 * @package namespace App\Http\Controllers\Building;
 */
class BuildingsController extends Controller
{
    /**
     * @var BuildingRepository
     */
    protected $repository;

    /**
     * @var BuildingValidator
     */
    protected $validator;

    protected $service;
    /**
     * BuildingsController constructor.
     *
     * @param BuildingRepository $repository
     * @param BuildingValidator $validator
     */
    public function __construct(BuildingRepository $repository, BuildingValidator $validator, BuildingDomainService $service)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
//        $this->repository->scopeQuery(function($query){
//            return $query->where('id','>',3);
//        });
        $buildings = $this->repository->paginate();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $buildings,
            ]);
        }

        return view('buildings.index', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BuildingCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BuildingCreateRequest $request)
    {
        try {

//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

//            $building = $this->repository->create($request->all());
            $building = $this->service->createBuilding($request->all());

            $response = [
                'message' => 'Building created.',
                'data'    => $building->toArray(),
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
        $building = $this->repository->with(['contractInfo','propertyInfo','floors'])->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $building,
            ]);
        }

        return view('buildings.show', compact('building'));
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
        $building = $this->repository->find($id);

        return view('buildings.edit', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BuildingUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BuildingUpdateRequest $request, $id)
    {
        try {

//            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $building = $this->service->updateBuilding($request->all(), $id);

            $response = [
                'message' => 'Building updated.',
                'data'    => $building,
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
        $deleted = $this->service->deleteBuildingById($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Building deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Building deleted.');
    }
}
