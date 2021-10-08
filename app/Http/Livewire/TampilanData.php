<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;

class TampilanData extends Component
{
    public  $idSubCategory,
            $idSubCategoryCreateProduct,
            $idCategory,
            $nameCategory;

    public function render()
    {
        return view('livewire.tampilan-data',[
            'subCategories' => SubCategory::all(), //nampilkan data sub category
            'categories' => Category::all(), //menampilkan category sesuai data idSubCategory
            'products' => Product::all(),
            'product' => Product::all()->where('idCategory', $this->idCategory),
            'dataSubCategory' => SubCategory::where('idSubCategory', $this->idSubCategory)->first(),
        ]);
    }

    public function getIdCategory($idCategory,$category,$idSubCategory){
        $this->idCategory = $idCategory;
        $this->nameCategory = $category;
        $this->idSubCategory = $idSubCategory;
    }

    public function allProduct(){
        $this->idCategory = null;
    }

}
