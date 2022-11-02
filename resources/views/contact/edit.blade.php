@extends('layouts.app')

@section('content')
    <form class="" method="post" action="{{route('contact.update',$contact->id)}}">
        @csrf
        @method('put')
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

                               @if($contact->photo)
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($contact->photo)}}" id="createImg" class="w-100 " alt="">
                                @else
                                    <img src="{{asset('storage/grey_silhouette.png')}}" id="createImg" class="w-100 " alt="">
                                @endif
                                <div class="position-absolute user-camera" id="toUploadImg">
                                    <i class="bi bi-camera fs-4"></i>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="h-100  d-flex align-items-end justify-content-end">
                        <input type="file" name="photo" class="@error('photo') is-invalid @enderror" id="photo" class="d-none">
                        @error('photo')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                        <div class="">
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        {{--        form--}}
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
                        <div class="form-floating">
                            <input type="text" value="{{$contact->fname}}" class="form-control @error('first') is-invalid @enderror" name="first" id="floatingInput" placeholder="firstname">
                            <label for="floatingInput">First Name</label>

                        </div>
                        @error('first')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="col-5">
                        <div class="form-floating">
                            <input type="text" value="{{$contact->lname}}" class="form-control @error('last') is-invalid @enderror" name="last" id="floatingPassword" placeholder="surname">
                            <label for="floatingPassword">Surname</label>
                        </div>
                    </div>
                </div>


            </div>



            <div class="mb-3 row g-1 align-items-center">
                <div class="col-1">
                    <div class="text-center">
                        <i class="bi bi-building fs-3"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-floating">
                        <input type="text" value="{{$contact->company}}" class="form-control @error('company') is-invalid @enderror" name="company" id="floatingInput" placeholder="company">
                        <label for="floatingInput">Company</label>
                    </div>
                </div>

            </div>

            <div class="mb-3 row g-1">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="form-floating">
                        <input type="text" name="job" value="{{$contact->jobTitle}}" class="form-control @error('job') is-invalid @enderror" id="floatingPassword" placeholder="job">
                        <label for="floatingPassword">Job Title</label>
                    </div>
                </div>

            </div>

            <div class="mb-3 row align-items-center g-1">
                <div class="col-1">
                    <div class="text-center">
                        <i class="bi bi-envelope fs-3"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-floating">
                        <input type="email" value="{{$contact->email}}" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingPassword" placeholder="email">
                        <label for="floatingPassword">email</label>
                    </div>
                </div>

            </div>

            <div class="mb-3 row align-items-center g-1">
                <div class="col-1">
                    <div class="text-center">
                        <i class="bi bi-telephone-fill fs-3"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-floating">
                        <input type="number" value="{{$contact->phone}}" name="phone" class="form-control @error('phone') is-invalid @enderror" id="floatingPassword" placeholder="job">
                        <label for="floatingPassword">phone</label>
                    </div>
                </div>

            </div>


            <div class="mb-3 row g-1">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="form-floating">
                        <input type="date" value="{{$contact->birthday}}" class="form-control @error('birthday') is-invalid @enderror" name="birthday" id="floatingInput" placeholder="birthday">
                        <label for="floatingInput">birthday</label>
                    </div>
                </div>

            </div>

            <div class="mb-3 row align-items-center g-1">
                <div class="col-1">
                    <div class="text-center">
                        <i class="bi bi-sticky fs-3"></i>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-floating">
                        <input type="text" value="{{$contact->notes}}" name="notes" class="form-control" id="floatingnotes" placeholder="notes">
                        <label for="floatingnotes">notes</label>
                    </div>
                </div>

            </div>

    </div>
        </div>

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
