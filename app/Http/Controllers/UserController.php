<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\InputBoundaries\UserListInputBoundary;
use App\InputBoundaries\UserRegisterInputBoundary;
use App\InputBoundaries\UserUpdateInputBoundary;
use App\Presenters\UserListJsonPresenter;
use App\Presenters\UserRegistrationJsonPresenter;
use App\Presenters\UserRemoveJsonPresenter;
use App\Presenters\UserUpdateJsonPresenter;
use App\UseCases\UserListUseCase;
use App\UseCases\UserRegistrationUseCase;
use App\UseCases\UserRemoveUseCase;
use App\UseCases\UserUpdateUseCase;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputBoundary = new UserListInputBoundary();
        $input = $inputBoundary->make($request->query());
        $presenter = new UserListJsonPresenter();
        $uc = new UserListUseCase($presenter);
        return $uc->perform($input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $userRegisterInput = new UserRegisterInputBoundary();
        $inputBoundary = $userRegisterInput->make($request->toArray());
        $presenter = new UserRegistrationJsonPresenter();
        $useCase = new UserRegistrationUseCase($presenter);
        return $useCase->perform($inputBoundary);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputBoundary = new UserUpdateInputBoundary();
        $input = $inputBoundary->make($request->toArray(), $id);
        $presenter = new UserUpdateJsonPresenter();
        $UC = new UserUpdateUseCase($presenter);
        return $UC->perform($input);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presenter = new UserRemoveJsonPresenter();
        $UC = new UserRemoveUseCase($presenter);
        return $UC->perform($id);

    }
}