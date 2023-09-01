<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;
use App\Entities\Group;
use App\Entities\Product;
use Auth;

/**
 * Class MovimentsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MovimentsController extends Controller
{
    protected $repository;
    protected $validator;


    public function __construct(MovimentRepository $repository, MovimentValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;

    }

    public function application()
    {
        
        $user = Auth::user();
      
        $group_list = $user->groups->pluck('name', 'id');
        $product_list = Product::all()->pluck('name', 'id');

        
        return view('moviments.application', [
            'group_list' => $group_list,
            'product_list' => $product_list
        ]);
    }
}
