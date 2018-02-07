<?php namespace loja\Http\Controllers;

use Illuminate\Support\Facades\DB;
use loja\Product;
use loja\Category;
use loja\Http\Requests\ProductsRequest;
use loja\Helper\RequestHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Request;

class ProductController extends Controller{
      
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show', 'store']]);
    }
	  
    public function index(){
		
		$product = (new Product)->newQuery();
		
		if (Request::has('q'));
		{
	
			if(Request::has('filter') && Request::get('filter') === 'category')
			{
			    $product->whereHas('categories', function($q)
				{
					$q->where('name', 'like', '%' . Request::get('q') . '%');
				});
				
			}else
			{
				$product->where('name', 'like', '%' . Request::get('q') . '%');
			}

		}
        
        return view('products.index')->with('products', $product->get());
    }
   
    public function show($id)
    {
        $product = Product::find($id);

        if(empty($product)) {
            return "Esse produto não existe";
        }

        return view('products.show')->with('product', $product);
    }

    public function create()
    {	
		$categories = Category::all()->pluck('name','id');
        return view('products.create')->with('categories', $categories);
    }

    public function store(ProductsRequest $request)
    {     
	
		$data = $request->all();
	
		if ($request->hasFile('file')) {
			$filename = RequestHelper::saveImage($request);
			$data['image'] = $filename;
		}
		
		Product::create($data)->categories()->attach($request->categories);
		Session::flash('message', 'Produto cadastrado com sucesso');
		return redirect('products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
		$categories = Category::all()->pluck('name','id');
        return view('products.edit')->with('product', $product)->with('categories', $categories);
    }

    public function update($id, ProductsRequest $request)
    {
		$product = Product::findOrFail($id);
		$product->categories()->sync($request->categories);
		
		$data = $request->all();
		
		if ($request->hasFile('file')) {
			$filename = RequestHelper::saveImage($request);
			$data['image'] = $filename;
		}
	
		$product->update($data);
        Session::flash('message', 'Produto atualizado com sucesso');
        return redirect('products');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();
        Session::flash('message', 'Produto excluído com sucesso');
        return redirect('products');
    }
	
    public function findAll()
    {
		return Product::all();
    }

}