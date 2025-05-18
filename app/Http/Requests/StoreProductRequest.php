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
 * 
 *
 * @return array<string, 
\Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
 */
 public function rules(): array
 {
 return [
 'code' => 'required|numeric|digits:4|unique:products,code|regex:/^(?!.*(.).*\1)\d{4}$/',
 'name' => 'required|string|max:250',
 'quantity' => 'required|integer|min:1|max:10000',
 'price' => 'required|numeric|min:0|max:999999.99',
 'description' => 'nullable|string',
 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
 ];
 }
}