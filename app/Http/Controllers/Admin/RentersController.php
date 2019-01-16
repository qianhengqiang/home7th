<?php

namespace App\Http\Controllers\Admin;

use App\DomainService\RenterDomainService;
use App\Http\Requests\Renter\RenterCreateRequest;
use App\Http\Requests\Renter\RenterUpdateRequest;
use App\Repositories\Renter\RenterRepository;
use App\Validators\Renter\RenterValidator;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
//use App\Repositories\RenterRepository;
//use App\Validators\RenterValidator;

/**
 * Class RentersController.
 *
 * @package namespace App\Http\Controllers;
 */
class RentersController extends Controller
{
    /**
     * @var RenterRepository
     */
    protected $repository;

    /**
     * @var RenterValidator
     */
    protected $validator;

    protected $service;
    /**
     * RentersController constructor.
     *
     * @param RenterRepository $repository
     * @param RenterValidator $validator
     */
    public function __construct(RenterRepository $repository, RenterValidator $validator,RenterDomainService $service)
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
        $renters = $this->repository->paginate();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $renters,
            ]);
        }

        return view('renters.index', compact('renters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RenterCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(RenterCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $renter = $this->service->createRenter($request->all());

            $response = [
                'message' => 'Renter created.',
                'data'    => $renter,
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
        $renter = $this->repository->with(['companyInfo','kaipiaoInfo'])->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $renter,
            ]);
        }

        return view('renters.show', compact('renter'));
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
        $renter = $this->repository->find($id);

        return view('renters.edit', compact('renter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RenterUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(RenterUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

//            $renter = $this->repository->update($request->all(), $id);
            $renter = $this->service->updateRenter($request->all(), $id);

            $response = [
                'message' => 'Renter updated.',
                'data'    => $renter,
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
        $deleted = $this->service->deleteRenter($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Renter deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Renter deleted.');
    }
}
