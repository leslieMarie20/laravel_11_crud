<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreProductRequest extends FormRequest
{
 
 public function authorize(): bool
 {
 return true;
 }
 /**
 * Get the validation rules that apply to the request.
 *
 * @return array<string, 
\Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
 */
 public function rules(): array
 {
 return [
 'code' => 'required|string|max:50|unique:products,code',
 'name' => 'required|string|max:250',
 'quantity' => 'required|integer|min:1|max:10000',
 'price' => 'required|numeric|min:0|max:999999.99',
 'description' => 'nullable|string',
 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
 ];
 }
}