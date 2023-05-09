<?php
namespace App\Services;

// use App\Models\Product;

// use GuzzleHttp\Psr7\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthService
{
    public function checkLogin($data)
    {
        if(Auth::attempt([
            'email'=> $data['email'],
            'password'=>$data['password'],
        ])){
            $user = User::where('email', $data['email'])->first();
            Auth::login($user);
            return true;
        }
        else{
            return false;
        }
        // if (Auth::check()) {
        //     return true;
        // }

        // return false;

    }
    public function checkPermission(){
        // if(Auth::check())
    }
    // public function createProduct($data)
    // {
    //     // Validate data
    //     $validatedData = validator($data, [
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric|min:0',
    //         'quantity' => 'required|integer|min:0',
    //     ])->validate();

    //     // Create new product
    //     $product = new Product();
    //     $product->name = $validatedData['name'];
    //     $product->description = $validatedData['description'];
    //     $product->price = $validatedData['price'];
    //     $product->quantity = $validatedData['quantity'];
    //     $product->save();

    //     return $product;
    // }
}
