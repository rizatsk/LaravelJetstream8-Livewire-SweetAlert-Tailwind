<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;

class TampilanData extends Component
{
    use WithPagination;
 
    protected $paginationTheme = 'bootstrap';
    public  $idSubCategory,
            $idSubCategoryCreateProduct,
            $idCategory,
            $nameCategory,
            $search;

    public function render()
    {
        return view('livewire.tampilan-data',[
            'subCategories' => SubCategory::all(), //nampilkan data sub category
            'categories' => Category::all(), //menampilkan category sesuai data idSubCategory
            
            'products' => $this->search === null ?
                Product::latest()->paginate(5) : 
                Product::where('product', 'like', '%'.$this->search.'%')->paginate(5),
                
            'dataProductCategory' => Product::latest()->where('idCategory', $this->idCategory)->paginate(1),
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
