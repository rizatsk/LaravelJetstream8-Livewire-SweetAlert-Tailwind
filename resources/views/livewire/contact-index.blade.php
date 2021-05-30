<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    
    <div class="row">
      <div class="mt-4 m-auto">
        <div class="card col-10 m-auto">
          <div class="card-header ">
            <h1 class="fs-4 fw-bold">My Contacts</h1>
          </div>

          {{-- Alert Success --}}
          {{-- SVG --}}
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
          </svg>
          {{-- Alert --}}
          @if (session()->has('message'))
          <div class="row mt-2 m-2">
            <div class="col-sm-12">
              <div class="alert alert-success d-flex align-items-center bgcolor-green-500" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  {{session('message')}}
                </div>
              </div>
            </div>
          </div>
          @endif
          {{-- End Alert --}}
          
          @if ($statusUpdate)
            <livewire:contact-update></livewire:contact-update>
            @else
            <livewire:contact-create></livewire:contact-create>
          @endif
          
          <div class="flex justify-between mt-4">
            <div class="col">
              <select wire:model="paginate" name="" id="" class="form-control form-control-sm py-1 rounded-lg w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
              </select>
            </div>
            <div class="col">
              <input wire:model="search" type="text" class="form-control form-control-sm py-1 rounded-lg w-auto" placeholder="Search">
            </div>
          </div>
          <hr>

          <div class="card-body">
              {{-- <blockquote class="blockquote mb-0"> --}}
             <div class="">
               <table class="table-fixed w-full">
                   <thead class="bg-gradient-to-r from-green-400 to-blue-500 text-white">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach ($contacts as $contact)
                        <?php $no++; ?>
                      <tr>
                        <td>{{$no}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>
                            <button wire:click="getContact({{$contact->id}})" type="button" class="rounded-full py-1 px-6 bg-blue-500 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">Edit</button>
                            <button wire:click="destroy({{$contact->id}})" type="button" class="rounded-full py-1 px-6 m-2 bg-red-500 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">Delete</button>
                        </td>
                      </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
                <div class="m-auto">
                  {{$contacts->links()}}
                </div>
              {{-- </blockquote> --}}
            </div>
          </div>
    </div>
</div>
</div>
