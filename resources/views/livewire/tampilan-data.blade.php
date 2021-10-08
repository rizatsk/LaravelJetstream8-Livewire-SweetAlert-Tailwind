  <div>
    <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
      <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bootstrap-fill" viewBox="0 0 16 16">
        <path d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z"/>
        <path d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396H5.062z"/>
      </svg>
        <span class="ms-3 fs-5 fw-semibold">Category Product</span>
      </a>
      <ul class="list-unstyled ps-0">
        <li class="mb-1">
          <a wire:click.prevent="allProduct" class="btn align-items-center rounded" aria-expanded="false">
            <h6>All Product</h6>
          </a>
        </li>
        @foreach ($subCategories as $subCategory)
          <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#{{$subCategory->idSubCategory}}" aria-expanded="false">
              {{$subCategory->subCategory}}
            </button>
          <div class="collapse" id="{{$subCategory->idSubCategory}}">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              @foreach ($categories as $category)
                @if ($subCategory->idSubCategory === $category->idSubCategory)
                  <li><a wire:click.prevent="getIdCategory('{{$category->idCategory}}','{{$category->category}}','{{$subCategory->idSubCategory}}')" class="link-dark rounded">{{$category->category}}</a></li>
                @endif
              @endforeach
            </ul>
          </div>
        </li>
        @endforeach

        {{-- Dan lain-lain --}}
        <li class="border-top my-3"></li>
        <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Account
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">New...</a></li>
            <li><a href="#" class="link-dark rounded">Profile</a></li>
            <li><a href="#" class="link-dark rounded">Settings</a></li>
            <li><a href="#" class="link-dark rounded">Sign out</a></li>
          </ul>
        </div>
        </li>
      </ul> 
    </div>

    <div class="col-sm-6">
      @if ( $idCategory === null)
        <h4>All Products</h1>
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
          <div class="m-auto">
            {{$products->links()}}
          </div>
      @else
      <h4>{{$dataSubCategory->subCategory}}/{{$nameCategory}}</h1>
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
              @foreach ($dataProductCategory as $product)
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
        <div class="m-auto">
          {{$dataProductCategory->links()}}
        </div>
      @endif
    </div>
</div>
  {{-- wire:click="idSubCategory('{{$subCategory->idSubCategory}}')" --}}