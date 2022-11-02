<div class="position-fixed mt-5">
    <div class="list-group mb-3">
        <a href="{{route('contact.create')}}"
           class=" text-center list-group-item rounded-pill bg-white shadow-sm py-1"
           style="width: 190px"
        >
        <span class="me-2" aria-hidden="true">
            <svg width="36" height="36" viewBox="0 0 36 36">
                <path fill="#34A853" d="M16 16v14h4V20z">
                </path>
                <path fill="#4285F4" d="M30 16H20l-4 4h14z"></path>
                <path fill="#FBBC05" d="M6 16v4h10l4-4z"></path>
                <path fill="#EA4335" d="M20 16V6h-4v14z"></path>
                <path fill="none" d="M0 0h36v36H0z"></path>
            </svg>
        </span>
            <span class="fs-6">Create Contact</span>
        </a>
    </div>

    <div class="list-group border-bottom border-1 pb-3  ">

        <a href="{{route('contact.index')}}" class="d-flex  mb-1 fs-6 border-0 list-group-item  d-flex justify-content-between align-items-center">
            <div class="">
                <i class="bi bi-person fs-5 me-3"></i>
                <span>Contacts</span>
            </div>
            <span>3</span>
        </a>

        <a href="{{route('contact.index')}}" class=" fs-6 mb-1 border-0 list-group-item justify-content-between d-flex align-items-center">
            <div class="">
                <i class="bi bi-arrow-clockwise fs-5 me-3"></i>
                <span>Frequently contacted</span>
            </div>

        </a>

        <a href="{{route('contact.index')}}" class=" py-1 mb-1 border-0 list-group-item justify-content-between d-flex align-items-center">
            <div class="d-flex">
                <div class=" me-3">
                    <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd cdByRd RTiFqe undefined"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h4l3 3 3-3h4c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 16h-4.83l-.59.59L12 20.17l-1.59-1.59-.58-.58H5V4h14v14zm-7-1l1.88-4.12L18 11l-4.12-1.88L12 5l-1.88 4.12L6 11l4.12 1.88z"></path></svg>
                </div>
                <span>Merge and fix</span>
            </div>
        </a>
    </div>

    <div class="list-group  border-bottom border-1">
        <div class="accordion" id="labels">
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        labels
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="heading" data-bs-parent="#labels">
                    <div class="accordion-body">
                        <div class="d-flex ">
                            <i class="bi bi-plus fs-5 me-3"></i>
                            <p class="mb-0">Create Label</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="list-group  border-bottom border-1">
        <button class="list-group-item d-flex border-0">
            <i class="bi bi-cloud-arrow-up me-3 fs-5 "></i>
            <span>Import</span>
        </button>
        <form action="{{route('contact.export')}}" method="post">
            @csrf
            <button class="list-group-item d-flex border-0">
                <i class="bi bi-cloud-arrow-down me-3 fs-5 "></i>
                <span>Export</span>
            </button>
        </form>

        <form action="{{route('contact.printAll')}}" method="post">
            @csrf
            <button class="list-group-item d-flex border-0">
                <i class="bi bi-printer me-3 fs-5 "></i>
                <span>Print</span>
            </button>
        </form>

    </div>

    <div class="list-group  border-bottom border-1">
        <button class="list-group-item d-flex border-0">
            <i class="bi bi-file-arrow-down me-3 fs-5 "></i>
            <span>Other Contacts</span>
        </button>
        <a href="{{route('contact.index',['trash'=>true])}}" class="list-group-item d-flex border-0">
            <i class="bi bi-trash3 me-3 fs-5 "></i>
            <span>Bin</span>
        </a>


    </div>
</div>
