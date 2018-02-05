<?php namespace loja\Http\Controllers;

use Illuminate\Support\Facades\DB;
use loja\Category;
use loja\Product;
use loja\Http\Requests\CategoriesRequest;
use loja\Helper\RequestHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Request;

class CategoryController extends Controller{
	
    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index', 'show', 'store']]);
    }
	
    public function index(){
		
		$category = (new Category)->newQuery();
		
		if (Request::has('q'));
		{
			$category->where('name', 'like', '%' . Request::get('q') . '%')
					->orderBy('name', 'desc');
		}
        
        return view('categories.index')->with('categories', $category->get());
    }
   
    public function show($id)
    {
        $category = Category::find($id);

        if(empty($category)) {
            return "Essa categoria não existe existe";
        }

        return view('categories.show')->with('category', $category);
    }

    public function create()
    {
		$products = Product::all()->pluck('name','id');
        return view('categories.create')->with('products', $products);;
    }
	
    public function store(CategoriesRequest $request)
    {     

		$data = $request->all();
	
		if ($request->hasFile('file')) {
			$filename = RequestHelper::saveImage($request);
			$data['image'] = $filename;
		}
		
		Category::create($data)->products()->attach($request->products);;
		Session::flash('message', 'Categoria cadastrada com sucesso');
		return redirect('categories');
		
    }

    public function edit($id)
    {
        $category = Category::find($id);
		$products = Product::all()->pluck('name','id');
        return view('categories.edit')->with('category', $category)->with('products', $products);;;
    }
	
    public function update($id, CategoriesRequest $request)
    {

        $category = Category::findOrFail($id);
		$category->products()->sync($request->products);
		
		$data = $request->all();
		
		if ($request->hasFile('file')) {
			$filename = RequestHelper::saveImage($request);
			$data['image'] = $filename;
		}
		
		$category->update($data);

        Session::flash('message', 'Categoria atualizada com sucesso');
        return redirect('categories');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('message', 'Categoria excluída com sucesso');
        return redirect('categories');
    }
	
    public function findAll()
    {
		return Category::all();
    }

}