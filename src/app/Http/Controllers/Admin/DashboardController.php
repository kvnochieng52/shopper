<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        return Inertia::render('Dashboard/Index', [
            'products' => Product::select([
                'products.*',
                'categories.category_name'
            ])
                ->LeftJoin('categories', 'products.category_id', 'categories.id')->orderBy('id', 'DESC')->paginate(10),
            'categories' => Category::paginate(10),

        ]);
    }


    public function create(Request $request)
    {


        return Inertia::render('Dashboard/Create', [
            'categories' => Category::where('visible', 1)->pluck('category_name', 'id')
        ]);
    }


    public function store(Request $request)
    {



        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            // 'date_online' => 'required',
            // 'date_offline' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            // 'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'

        ]);

        $product = new Product();

        $product->title = $request->input('title');
        $product->slug =  strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->input('title')));
        $product->category_id = $request->input('category');
        $product->email = $request->input('email');
        $product->mobile = $request->input('telephone');
        $product->date_online = Carbon::parse($request->input('date_online'))->toDateTimeString();
        $product->date_offline = Carbon::parse($request->input('date_offline'))->toDateTimeString();
        $product->price = $request->input('price');
        $product->currency = env('CURRENCY');

        $product->description = $request->input('description');
        $product->created_by = Auth::user()->id;
        $product->updated_by = Auth::user()->id;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image_file = $request->file('image');
            $image_file_name = Str::random(30) . '.' . $image_file->getClientOriginalExtension();
            $image_file->move('images/', $image_file_name);
            $product->image =  $image_file_name;
        }

        $product->save();

        return redirect('dashboard/')->with('success', 'Product Created Successfully !');
    }
}
