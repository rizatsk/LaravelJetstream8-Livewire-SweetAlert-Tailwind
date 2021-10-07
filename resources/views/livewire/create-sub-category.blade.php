<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div>
        <h1>Menambahkan SUB Category</h1>
        <div class="row mb-5">
            <div class="col-sm-6">
                <form wire:submit.prevent="storeSubCategory">
                    <div class="mb-3">
                      <label for="subCategory" class="form-label">Sub Category</label>
                      <input wire:model="subCategory" type="text" class="form-control" id="subCategory" name="subCategory" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">Isi dengan text dan tidak lebih dari 50 characeter.</div>
                    </div>
                    <button type="reset" class="btn btn-light me-2" id="close">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Sub Category</th>
                            <th scope="col">Sub Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategories as $subCategory)
                        <tr>
                            <td>{{$subCategory->idSubCategory}}</td>
                            <td>{{$subCategory->subCategory}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Create Category --}}
    <div class="mt-5 mb-5">
        <h1>Menambahkan Category</h1>
        <div class="row">
            <div class="col-sm-6">
                <form wire:submit.prevent="storeCategory">
                    <div class="mb-3">
                        <label for="subCategory" class="form-label">Sub Category</label>
                        <select wire:model="idSubCategory" class="form-select  @error('idSubCategory') is-invalid @enderror" aria-label="Default select example" id="subCategory">
                            <option selected value="">Pilih Sub Category</option>
                            @foreach ($subCategories as $subCategory)
                                <option value={{ $subCategory->idSubCategory }} > {{ $subCategory->subCategory }} </option>
                            @endforeach
                        </select>
                        @error('idSubCategory')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="category" class="form-label">Category</label>
                      <input wire:model="category" type="text" class="form-control @error('category') is-invalid @enderror" id="category" name="category" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">Isi dengan text dan tidak lebih dari 50 characeter.</div>
                      @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                    </div>
                    <button type="reset" class="btn btn-light me-2" id="close">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Sub Category</th>
                            <th scope="col">ID Category</th>
                            <th scope="col">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->idSubCategory}}</td>
                            <td>{{$category->idCategory}}</td>
                            <td>{{$category->category}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Create Produk --}}
        <div class="mt-5 mb-5">
            <h1>Menambahkan Produk</h1>
            <div class="row">
                <div class="col-sm-6">
                    <form wire:submit.prevent="storeProduct">
                        <div class="mb-3">
                            <label for="subCategory" class="form-label">Sub Category</label>
                            <select wire:model="idSubCategoryCreateProduct" class="form-select  @error('idSubCategoryCreateProduct') is-invalid @enderror" aria-label="Default select example" id="subCategory">
                                <option selected value="">Pilih Sub Category</option>
                                @foreach ($subCategories as $subCategory)
                                    <option value={{ $subCategory->idSubCategory }} > {{ $subCategory->subCategory }} </option>
                                @endforeach
                            </select>
                            @error('idSubCategoryCreateProduct')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select wire:model="idCategory" class="form-select  @error('idCategory') is-invalid @enderror" aria-label="Default select example" id="category">
                                <option selected value="">Pilih Category</option>
                                @foreach ($selectCategories as $category)
                                    <option value={{ $category->idCategory }} > {{ $category->category }} </option>
                                @endforeach
                            </select>
                            @error('idCategory')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                          <label for="product" class="form-label">Product</label>
                          <input wire:model="product" type="text" class="form-control @error('product') is-invalid @enderror" id="product" name="product" aria-describedby="product">
                          <div id="product" class="form-text">Isi dengan text dan tidak lebih dari 50 characeter.</div>
                          @error('product')
                            <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="mb-3">
                          <label for="deskripsiProduct" class="form-label">Deskripsi Product</label>
                          <input wire:model="deskripsiProduct" type="text" class="form-control @error('deskripsiProduct') is-invalid @enderror" id="deskripsiProduct" name="deskripsiProduct" aria-describedby="deskripsiProduct">
                          <div id="deskripsiProduct" class="form-text">Isi dengan text dan tidak lebih dari 50 characeter.</div>
                          @error('deskripsiProduct')
                            <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="mb-3">
                          <label for="photoProduct" class="form-label">Photo Product</label>

                          @if ($photoProduct)
                          <div class="row mb-3">
                              <div class="col-auto">
                                  <img alt="profile image" class="d-blok" style="max-width:130px;margin-top:20px" src="{{ $photoProduct->temporaryUrl() }}">
                              </div>
                          </div>
                          @endif

                          <input wire:model="photoProduct" type="file" class="form-control @error('photoProduct') is-invalid @enderror" id="photoProduct" name="photoProduct" aria-describedby="photoProduct">
                          @error('photoProduct')
                            <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>

                        <button type="reset" class="btn btn-light me-2" id="close">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID Category</th>
                                <th scope="col">ID Product</th>
                                <th scope="col">Product</th>
                                <th scope="col">Deskripsi Product</th>
                                <th scope="col">Photo Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->idCategory}}</td>
                                <td>{{$product->idProduct}}</td>
                                <td>{{$product->product}}</td>
                                <td>{{$product->deskripsiProduct}}</td>
                                <td><img src="{{url('storage/'.$product->photoProduct)}}" alt="{{$product->photoProduct}}" style="max-width: 60px"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>
