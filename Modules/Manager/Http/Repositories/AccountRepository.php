<?php

namespace Edaacil\Modules\Manager\Http\Repositories;

use Edaacil\Mail\SendWelcomeEmailToNewAgent;
use Edaacil\Modules\BaseRepository;
use Edaacil\Modules\Manager\Http\Models\Manager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AccountRepository extends BaseRepository
{

    function model()
    {
        return Manager::class;
    }

    /**
     * Create account
     * @param array $agentData
     * @return mixed
     * @throws \Exception
     */
    public function createAccount(array $agentData){

        $data = (object)$agentData;

        $manager =  $this->model()::create([
            'id'             => $this->generateUuid(),
            'first_name'     => $data->first_name,
            'last_name'      => $data->last_name,
            'email'          => $data->email,
            'phone_no'       => $data->phone_no,
            'role'           => $data->role,
            'status'         => 'Active',
            'address'        => $data->address,
            'city'           => $data->city,
            'state'          => $data->state,
            'country'        => $data->country,
            'password'       => Hash::make(str_random(6)),

        ]);
        Mail::to($data['email'])->send(new SendWelcomeEmailToNewAgent($manager));

    }

    /**
     * Update account
     * @param array $request
     * @return mixed
     */
    public function updateAccount(array $request){
        $data = (object) $request;

        $manager = $this->model()::where('id', $data->accountId)->first();
        return $manager->update([
            'email'  => $data->email,
            'status' => $data->status,
        ]);

    }

}