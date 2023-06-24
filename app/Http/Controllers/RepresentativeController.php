<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRepresentativeRequest;
use App\Http\Requests\UpdateRepresentativeRequest;
use App\Repositories\representativeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Representative;
use App\Models\User;

class RepresentativeController extends AppBaseController
{
    /** @var RepresentativeRepository $representativeRepository*/
    private $representativeRepository;

    public function __construct(RepresentativeRepository $representativeRepo)
    {
        $this->representativeRepository = $representativeRepo;
    }

    /**
     * Display a listing of the Representative .
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $representatives = $this->representativeRepository->all();

        return view('representatives.index')
            ->with('representatives', $representatives);
    }

    /**
     * Show the form for creating a new Representative.
     *
     * @return Response
     */
    public function create()
    {
        $route_id = null;
        $route = Representative::ROUTES;
        return view('representatives.create')->with('route',$route)->with('route_id',$route_id);
    }

    /**
     * Store a newly created Representative in storage.
     *
     * @param CreateRepresentativeRequest $request
     *
     * @return Response
     */
    public function store(CreateRepresentativeRequest $request)
    {
        $input = $request->all();

        $representative = $this->representativeRepository->create($input);

        Flash::success('Representative added successfully.');

        return redirect(route('representatives.index'));
    }

    /**
     * Display the specified Representative.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $representative = $this->representativeRepository->find($id);

        if (empty($representative)) {
            Flash::error('Representative not found');

            return redirect(route('representatives.index'));
        }
        return view('representatives.show')->with('representative', $representative);
    }

    /**
     * Show the form for editing the specified Representative.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $representative = $this->representativeRepository->find($id);
        $route_id = $representative->route;
        $route = Representative::ROUTES;
        if (empty($representative)) {
            Flash::error('Representative not found');

            return redirect(route('representatives.index'));
        }

        return view('representatives.edit')->with('representative', $representative)->with('route',$route)->with('route_id',$route_id);
    }

    /**
     * Update the specified Representative in storage.
     *
     * @param int $id
     * @param UpdateRepresentativeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRepresentativeRequest $request)
    {
        $representative = $this->representativeRepository->find($id);

        if (empty($representative)) {
            Flash::error('Representative not found');

            return redirect(route('representatives.index'));
        }

        $representative = $this->representativeRepository->update($request->all(), $id);

        Flash::success('Representative updated successfully.');

        return redirect(route('representatives.index'));
    }

    /**
     * Remove the specified Representative from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $representative = $this->representativeRepository->find($id);

        if (empty($representative)) {
            Flash::error('Representative not found');

            return redirect(route('representatives.index'));
        }

        $this->representativeRepository->delete($id);

        Flash::success('Representative deleted successfully.');

        return redirect(route('representatives.index'));
    }
}
