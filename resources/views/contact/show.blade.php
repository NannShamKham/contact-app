@extends('layouts.app')
@section('content')
    <form class="overflow-scroll" method="post" action="{{route('contact.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="p-3 bg-white mb-3 ">

            {{--        photo--}}
            <div class="photoDiv mb-3 pb-3 border-bottom position-fixed bg-white  border-1">
                <div class="row">
                    <div class="col-2">
                        <div>
                            <div class="">
                                <a href="{{route('contact.index')}}" class="btn"> <i class="bi bi-arrow-left fs-6"></i></a>
                            </div>
                            <div class="">

                                <div class="rounded-pill w-100 align-items-baseline overflow-hidden position-relative">
                                    @if($contact->photo)
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($contact->photo)}}"  class="w-100 contact-photo" alt="">
                                    @else
                                        <img src="{{asset('storage/grey_silhouette.png')}}" id="createImg" class="w-100 " alt="">

                                    @endif

                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-column justify-content-center h-100">
                            <h3 class="mb-1 ">{{$contact->fullName}}</h3>
                            <h5 class="mb-0 ">{{$contact->jobTitle .".".$contact->company}}</h5>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="h-100  d-flex align-items-end justify-content-end">
                            <input type="file" name="photo" id="photo" class="d-none">
                            <div class="">
                                <a href="{{route('contact.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="my-5">
                <div class="py-5"></div>
            </div>
            <div class="row align-items-center py-5">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h4>Contact Details</h4>
                            @if($contact->email)
                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-envelope me-2"></i>
                                <a class="text-decoration-none"  href="https://mail.google.com/mail/u/0/?hl=en-GB&tf=cm&fs=1&to={{$contact->mail}}" target="_blank">{{$contact->email}}</a>

                            </div>
                            @else
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-envelope me-2"></i>
                                    <a class="text-decoration-none"  href="{{route('contact.edit',$contact->id)}}" target="_blank">{{$contact->email}}</a>

                                </div>
                            @endif

                            <div class="d-flex align-items-center mb-3">
                                <i class="bi bi-telephone me-2"></i>

                                <a href="#" class="text-decoration-none">{{$contact->phone}}</a>
                            </div>
                            @if($contact->birthday)
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-2">
                                    <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd cdByRd RTiFqe undefined"><path d="M0 0h24v24H0V0z" fill="none"></path><path fill="rgb(108,117,125" d="M19 14v-4c0-1.1-.9-2-2-2h-4V6.55c.15-.09.29-.18.41-.31.39-.39.59-.92.59-1.42s-.2-1.02-.59-1.41L12 2l-1.41 1.41c-.39.39-.59.91-.59 1.41s.2 1.03.59 1.42c.13.13.27.22.41.31V8H7c-1.1 0-2 .9-2 2v4c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2zM7 10h10v4H7v-4zm12 10H5v-4h14v4z"></path></svg>
                                </div>

                                <span>{{$contact->birthday}}</span>
                            </div>
                            @else
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2">
                                        <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd cdByRd RTiFqe undefined"><path d="M0 0h24v24H0V0z" fill="none"></path><path fill="rgb(108,117,125" d="M19 14v-4c0-1.1-.9-2-2-2h-4V6.55c.15-.09.29-.18.41-.31.39-.39.59-.92.59-1.42s-.2-1.02-.59-1.41L12 2l-1.41 1.41c-.39.39-.59.91-.59 1.41s.2 1.03.59 1.42c.13.13.27.22.41.31V8H7c-1.1 0-2 .9-2 2v4c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2zM7 10h10v4H7v-4zm12 10H5v-4h14v4z"></path></svg>
                                    </div>

                                    <a href="{{route('contact.edit',$contact->id)}}" class="text-decoration-none">Add Birthday</a>
                                </div>
                            @endif
                            @if($contact->notes)
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-book me-2"></i>

                                    <span>{{$contact->notes}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>



        </div>
        </div>
        @push('script')
            <script>





            </script>
        @endpush
        {{--                <button class="btn btn-primary">Create</button>--}}
    </form>
@endsection
