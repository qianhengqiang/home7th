<?php

namespace App\Http\Controllers\Admin;

use App\DomainService\ContractDomainService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\Contract\ContractCreateRequest;
use App\Http\Requests\Contract\ContractUpdateRequest;
use App\Repositories\Contract\ContractRepository;
use App\Validators\Contract\ContractValidator;

/**
 * Class ContractsController.
 *
 * @package namespace App\Http\Controllers\Contract;
 */
class ContractsController extends Controller
{
    /**
     * @var ContractRepository
     */
    protected $repository;

    /**
     * @var ContractValidator
     */
    protected $validator;

    protected $service;
    /**
     * ContractsController constructor.
     *
     * @param ContractRepository $repository
     * @param ContractValidator $validator
     */
    public function __construct(ContractRepository $repository, ContractValidator $validator, ContractDomainService $service)
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
        $contracts = $this->repository->with(['house','renter'])->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contracts,
            ]);
        }

        return view('contracts.index', compact('contracts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContractCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ContractCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

//            $contract = $this->repository->create($request->all());
            $contract = $this->service->contractCreate($request->all());

            $response = [
                'message' => 'Contract created.',
                'data'    => $contract->toArray(),
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
//        $contract = $this->repository->find($id);
        $contract = $this->repository->with(['house'])->find($id);


        if (request()->wantsJson()) {

            return response()->json([
                'data' => $contract,
            ]);
        }

        return view('contracts.show', compact('contract'));
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
        $contract = $this->repository->find($id);

        return view('contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContractUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ContractUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

//            $contract = $this->repository->update($request->all(), $id);
            $contract = $this->service->contractUpdate($request->all(),$id);

            $response = [
                'message' => 'Contract updated.',
                'data'    => $contract->toArray(),
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
        $deleted = $this->service->contractDelete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Contract deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Contract deleted.');
    }
}
