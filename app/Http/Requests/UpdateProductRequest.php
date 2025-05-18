<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateProductRequest extends FormRequest
{
 /**
 * 
 */
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
 'code' => 'required|numeric|digits:4|unique:products,code,'.$this->product->id.'|regex:/^(?!.*(.).*\1)\d{4}$/',
 'name' => 'required|string|max:250',
 'quantity' => 'required|integer|min:1|max:10000',
 'price' => 'required',
 'description' => 'nullable|string'
 ];
 }
}
