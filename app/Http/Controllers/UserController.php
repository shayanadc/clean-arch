<?php

namespace App\Http\Controllers;

use App\Entities\UserEntity;
use App\Http\Requests\UserStoreRequest;
use App\InputBoundaries\UserRegisterInputBoundary;
use App\Presenters\Presenter;
use App\Presenters\UserRegistrationJsonPresenter;
use App\UseCases\UserRegistrationUseCase;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $uc = new UserRemoveUseCase($presenter);
        return $uc->perform($id);

    }
}

class UserRemoveUseCase{
    private $presenter;
    public function __construct(Presenter $presenter)
    {
        $this->presenter = $presenter;
    }
    public function perform($id){
        try{
            User::findAndDelete($id);
            return $this->presenter->parse($id);
        }catch (\Exception $exception){
            return $this->presenter->parseException($exception);
        }
    }
}
class UserRemoveJsonPresenter implements Presenter{
    public function parse($output)
    {
        return response()->json(["message" => 'user ' . $output . ' deleted successfully'],200);
    }
    public function parseException($exception){
        return response()->json(["errors" =>  [ ["title" => "User Id Not Found."]]],400);
    }
}