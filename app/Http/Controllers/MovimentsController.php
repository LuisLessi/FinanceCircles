<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\MovimentRepository;
use App\Validators\MovimentValidator;
use App\Entities\Group;
use App\Entities\Product;
use App\Entities\Moviment;
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

    public function index()
    {
        return view('moviments.index', [
            'product_list' => Product::all(),
        ]);
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

    public function getback()
    {
        
        $user = Auth::user();
      
        $group_list = $user->groups->pluck('name', 'id');
        $product_list = Product::all()->pluck('name', 'id');

        
        return view('moviments.getback', [
            'group_list' => $group_list,
            'product_list' => $product_list
        ]);
    }

    public function storeApplication(Request $request)
    {
        $value = $request->get('value'); 
        $productId = $request->get('product_id');
        $product = Product::find($productId); 
        Moviment::create([
            'user_id'     => Auth::user()->id,
            'group_id'    => $request->get('group_id'),
            'product_id'  => $request->get('product_id'),
            'value'       => $value, 
            'type'        => 1,
            'date'        => date('Y-m-d')
        ]);
        
        session()->flash('success', [
            'success' => true,
            'messages' => "Applied $value on the {$product->name} product" // Use o nome do produto
        ]);
        
        return redirect()->route('moviment.application');
    }

    public function storeGetBack(Request $request)
    {
        $value = $request->get('value'); 
        $productId = $request->get('product_id');
        $product = Product::find($productId); 
        Moviment::create([
            'user_id'     => Auth::user()->id,
            'group_id'    => $request->get('group_id'),
            'product_id'  => $request->get('product_id'),
            'value'       => $request->get('value'),
            'type'        => 2,
            'date'        => date('Y-m-d')
        ]);
        
        session()->flash('success', [
            'success' => true,
            'messages' => "redeemed  $value on the {$product->name} product"
        ]);
        
        return redirect()->route('moviment.application');
    }

    public function all()
    {
        $moviments = Auth::user()->moviments;

        return view('moviments.all', [
            'moviments' => $moviments
        ]);
    }
}
