@extends('layouts.app')

@section('content')

    <form class="overflow-scroll" method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="p-3 bg-white mb-3 ">

{{--        photo--}}
        <div class="photoDiv mb-3 pb-3 border-bottom position-fixed bg-white  border-1">
            <div class="row">
                <div class="col-3">
                    <div>
                        <div class="">
                            <i class="bi bi-x-lg"></i>
                        </div>
                        <div class="">

                            <div class="rounded-pill w-50 align-items-baseline overflow-hidden position-relative display-image">

                                <img src="{{asset('storage/grey_silhouette.png')}}" id="createImg" class="w-100 " alt="">
                                <div class="position-absolute user-camera" id="toUploadImg">
                                    <i class="bi bi-camera fs-4"></i>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="h-100  d-flex align-items-end justify-content-end">
                        <input type="file" name="photo" id="photo" class="d-none">
                        <div class="">
                            <button  class="btn btn-secondary">Save</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>

            <div class="my-5">
                <div class="py-5"></div>
            </div>
           <div class="mb-3">
               <div class="row g-1 align-items-center">
                   <div class="col-1">
                       <div class="text-center">
                           <i class="bi text-secondary bi-person fs-2"></i>
                       </div>
                   </div>
                   <div class="col-5">
                       <div class="form-floating ">
                           <input  type="text" class="form-input  form-control @error('first') is-invalid @enderror" name="first" id="floatingInput" placeholder="firstname">
                           <label class="text-black-50" for="floatingInput">First Name</label>

                       </div>
                       @error('first')
                       <span class="invalid-feedback">{{$message}}</span>
                       @enderror

                   </div>
                   <div class="col-5">
                       <div class="form-floating">
                           <input  type="text" class="form-control form-input @error('last') is-invalid @enderror" name="last" id="floatingPassword" placeholder="surname">
                           <label class="text-black-50" for="floatingPassword">Surname</label>
                       </div>
                   </div>
               </div>


           </div>



            <div class="mb-3 row g-1 align-items-center">
                <div class="col-1">
                    <div class="text-center">
                        <i class="bi bi-building fs-5"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-floating">
                        <input  type="text" class="form-control form-input @error('company') is-invalid @enderror" name="company" id="floatingInput" placeholder="company">
                        <label class="text-black-50" for="floatingInput">Company</label>
                    </div>
                </div>

            </div>

            <div class="mb-3 row g-1">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="form-floating">
                        <input  type="text" name="job" class="form-control form-input @error('job') is-invalid @enderror" id="floatingPassword" placeholder="job">
                        <label class="text-black-50" for="floatingPassword">Job Title</label>
                    </div>
                </div>

            </div>

            <div class="mb-3 row align-items-center g-1">
                <div class="col-1">
                    <div class="text-center">
                        <i class="bi bi-envelope fs-5"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-floating">
                        <input  type="email" name="email" class="form-control form-input @error('email') is-invalid @enderror" id="floatingPassword" placeholder="email">
                        <label class="text-black-50" for="floatingPassword">email</label>
                    </div>
                </div>

            </div>

            <div class="mb-3 row align-items-center g-1">
                <div class="col-1">
                    <div class="text-center">
                        <i class="bi bi-telephone-fill fs-5"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-floating">
                        <input  type="number" name="phone" class="form-control form-input @error('phone') is-invalid @enderror" id="floatingPassword" placeholder="job">
                        <label class="text-black-50" for="floatingPassword">phone</label>
                    </div>
                </div>

            </div>


            <div class="mb-3 row g-1">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="form-floating">
                        <input  type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" id="floatingInput" placeholder="birthday">
                        <label class="text-black-50" for="floatingInput">birthday</label>
                    </div>
                </div>

            </div>

            <div class="mb-3 row align-items-center g-1">
                <div class="col-1">
                    <div class="text-center">
                        <i class="bi bi-sticky fs-5"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-floating">
                        <input  type="text" name="notes" class="form-control" id="floatingnotes" placeholder="notes">
                        <label class="text-black-50" for="floatingnotes">notes</label>
                    </div>
                </div>

            </div>

    </div>
        </div>
{{--                <button class="btn btn-primary">Create</button>--}}
            </form>

    @push('script')
        <script>
            // photo upload
            let photo = document.getElementById('photo');
            document.getElementById('toUploadImg').addEventListener('click',function (){
                photo.click();
            })



            photo.addEventListener("change", function() {
                const reader = new FileReader();
                reader.addEventListener("load", () => {
                    const uploaded_image = reader.result;
                    // document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
                    document.getElementById("createImg").src = `${uploaded_image}`
                });
                reader.readAsDataURL(this.files[0]);
            });
        </script>
    @endpush

@endsection
