<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Models\SubCategory;
use Livewire\WithFileUploads;

class CreateSubCategory extends Component
{
    use WithFileUploads;
    public  $subCategory,
            $idSubCategory,
            $idCategory,
            $idSubCategoryCreateProduct,
            $category,
            $product,
            $photoProduct,
            $deskripsiProduct;

    public function render()
    {
        return view('livewire.create-sub-category',[
            'subCategories' => SubCategory::all(), //nampilkan data sub category
            'categories' => Category::all()->where('idSubCategory',$this->idSubCategory), //menampilkan category sesuai data idSubCategory
            'selectCategories' => Category::all()->where('idSubCategory',$this->idSubCategoryCreateProduct), //untuk menampilkan select category
            'products' => Product::all()->where('idCategory', $this->idCategory),
        ]);
    }

    public function storeSubCategory(){
        $this->validate([
            'subCategory' => 'required|string|min:5|max:50|unique:sub_categories',
        ]);

        SubCategory::create([
            'idSubCategory' => SubCategory::kode(),
            'subCategory' => $this->subCategory,
        ]);
        
        $this->subCategory = null;

        // $this->emit('subCategoryStored', $subCategory);
    }

    public function storeCategory(){
        $this->validate([
            'idSubCategory' => 'required|string|min:5|max:50',
            'category' => 'required|string|min:5|max:50|unique:categories',
        ]);

        Category::create([
            'idSubCategory' => $this->idSubCategory,
            'idCategory' => Category::idCategory(),
            'category' => $this->category,
        ]);
        
        $this->category = null;
    }

    public function storeProduct(){
        $this->validate([
            'idSubCategoryCreateProduct' => 'required|string|min:5|max:50',
            'idCategory' => 'required|string|min:5|max:50',
            'product' => 'required|string|min:5|max:100|unique:products',
            'deskripsiProduct' => 'required|string|min:5|max:255',
            'photoProduct' => 'image|max:1024', // 1MB Max
        ]);

        $image = $this->photoProduct;
        $imageName = $image->storePublicly('imagesProduct','public');

        Product::create([
            'idCategory' => $this->idCategory,
            'idProduct' => Product::idProduct(),
            'product' => $this->product,
            'deskripsiProduct' => $this->deskripsiProduct,
            'photoProduct' => $imageName,
        ]);

        $this->idSubCategoryCreateProduct = null;
        $this->product = null;
        $this->deskripsiProduct = null;
        $this->photoProduct = null;
    }

}