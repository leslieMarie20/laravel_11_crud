<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
 
 public function index() : View
 {
 return view('products.index', [
 'products' => Product::where('user_id', auth()->id())->latest()->paginate(4)
 ]);
 }
 
 public function create() : View
 {
 return view('products.create');
 }
 
 public function store(StoreProductRequest $request) : RedirectResponse
 {
 $data = $request->validated();
 
 if (!auth()->check()) {
 return redirect()->route('login')->with('error', 'Please login to create a product.');
 }
 
 $user = auth()->user();
 $data['user_id'] = $user->id;
 
 if ($request->hasFile('image')) {
 $data['image'] = $request->file('image')->store('products', 'public');
 }
 
 Product::create($data);
 return redirect()->route('products.index')
 ->withSuccess('New product is added successfully.');
 }
 
 public function show(Product $product) : View
 {
 if ($product->user_id !== auth()->id()) {
 abort(403);
 }
 return view('products.show', compact('product'));
 }
 
 public function edit(Product $product) : View
 {
 if ($product->user_id !== auth()->id()) {
 abort(403);
 }
 return view('products.edit', compact('product'));
 }
 
 public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
 {
 if ($product->user_id !== auth()->id()) {
 abort(403);
 }
 
 $data = $request->validated();
 
 if ($request->hasFile('image')) {
 
 if ($product->image) {
 Storage::disk('public')->delete($product->image);
 }
 $data['image'] = $request->file('image')->store('products', 'public');
 }
 
 $product->update($data);
 return redirect()->back()
 ->withSuccess('Product is updated successfully.');
 }
 
 public function destroy(Product $product) : RedirectResponse
 {
 if ($product->user_id !== auth()->id()) {
 abort(403);
 }
 
 if ($product->image) {
 Storage::disk('public')->delete($product->image);
 }
 $product->delete();
 return redirect()->route('products.index')
 ->withSuccess('Product is deleted successfully.');
 }
}