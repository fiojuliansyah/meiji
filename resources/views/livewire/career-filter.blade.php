    <div>

        <section class="section-box mt-30">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
                        <div class="content-page">
                            <div class="box-filters-job">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-5"><span class="text-small text-showing">Showing
                                            <strong>{{ $careers->firstItem() }} </strong> -
                                            <strong>{{ $careers->lastItem() }} </strong> of <strong>
                                                {{ $careers->total() }} </strong> jobs </span></div>
                                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                                        <div class="display-flex2">

                                            <div class="btn-advanced-filter px-2 py-1 mr-10 d-lg-none">
                                                <a data-bs-toggle="offcanvas" href="#offcanvasWithBothOptions"
                                                    role="button" aria-controls="offcanvasWithBothOptions">
                                                    <i class="fi-rr-filter text-center"></i>

                                                </a>
                                            </div>

                                            <div class="box-border mr-5"><span class="text-sortby">Show:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        data-bs-display="static"><span>{{ $this->perPage }}</span><i
                                                            class="fi-rr-angle-small-down"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort">
                                                        <li><a class="dropdown-item {{ $this->perPage == '10' ? 'active' : '' }}"
                                                                href="" wire:click="setPerPage(10)">10</a></li>
                                                        <li><a class="dropdown-item {{ $this->perPage == '20' ? 'active' : '' }}"
                                                                href="" wire:click="setPerPage(20)">20</a></li>
                                                        <li><a class="dropdown-item {{ $this->perPage == '50' ? 'active' : '' }}"
                                                                href="" wire:click="setPerPage(50)">50</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box-border"><span class="text-sortby">Sort by:</span>
                                                <div class="dropdown dropdown-sort">
                                                    <button class="btn dropdown-toggle" id="dropdownSort2"
                                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                                        data-bs-display="static"><span>{{ $this->sortDirection == 'desc' ? 'Newest' : 'Oldest' }}</span><i
                                                            class="fi-rr-angle-small-down"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-light"
                                                        aria-labelledby="dropdownSort2">
                                                        <li><a class="dropdown-item {{ $this->sortDirection == 'desc' ? 'active' : '' }}"
                                                                href="" wire:click="sortNewest()">Newest</a>
                                                        </li>
                                                        <li><a class="dropdown-item {{ $this->sortDirection == 'asc' ? 'active' : '' }}"
                                                                href="" wire:click="sortOldest()">Oldest</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="box-view-type">
                                                <a class="view-type layout-job" wire:click="list" data-layout="list">
                                                    <img src="https://jobbox.archielite.com/themes/jobbox/imgs/template/icons/icon-list.svg"
                                                        alt="List layout">
                                                </a>
                                                <a class="view-type layout-job}}" wire:click="grid" data-layout="grid">
                                                    <img src="https://jobbox.archielite.com/themes/jobbox/imgs/template/icons/icon-grid.svg"
                                                        alt="Grid layout">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if ($careers->isEmpty())
                                    <div class="col-12 text-center">
                                        <p class="mt-4">No careers found.</p>
                                    </div>
                                @endif
                                @foreach ($careers as $career)
                                    <div
                                        class="{{ $layout == 'grid' ? 'col-xl-4 col-lg-4 col-md-6}' : '' }} col-sm-12 col-12">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-image-left"><span class="flash"></span>
                                                <div class="image-box"><img
                                                        src="/assets/media/logo.png"
                                                        alt="Meiji" width="100px"></div>
                                                <div class="right-info"><a class="name-job"
                                                        href="{{ route('career-detail', $career->id) }}">{{ $career->name }}</a><span
                                                        class="location-small">{{ $career->location->name }}</span>
                                                </div>
                                            </div>
                                            <div class="card-block-info">
                                                <h6>{{ $career->departement->name }}</h6>
                                                <div class="mt-5">
                                                    <span class="card-briefcase">{{ $career->type->name }}</span>
                                                    <span class="card-time">{{ $career->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="font-sm color-text-paragraph mt-15"
                                                    style="text-align:justify;display: -webkit-box;-webkit-line-clamp: 5;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                                    {!! $career->description !!} </div>
                                                <div class="card-2-bottom mt-30">
                                                    <div class="row">
                                                        <div class="col-lg-7 col-7"><span
                                                                class="card-text-price fs-6 text-danger">Rp.
                                                                {{ number_format($career->salary, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="col-lg-5 col-5 text-end">
                                                            <div class="btn btn-apply-now  me-6" data-bs-toggle="modal"
                                                                data-bs-target="#ModalApplyJobForm-{{ $career->id }}">
                                                                Apply now</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @include('layouts.components.guest.modal')
                                    </div>
                                @endforeach

                            </div>
                        </div>
                     
                        {{ $careers->links('livewire::simple-tailwind') }}
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12 d-none d-lg-block">
                        <div class="sidebar-shadow none-shadow mb-30">
                            @include('layouts.components.guest.sidebar-filter')
                        </div>

                    </div>
                </div>
            </div>
            <div class="offcanvas offcanvas-start w-75" data-bs-scroll="true" tabindex="-1"
                id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">

                <div class="offcanvas-body">
                    @include('layouts.components.guest.sidebar-filter')
                </div>
            </div>



        </section>



        @script()
            <script>
                $(document).ready(function() {
                    $('#select2').select2();
                    $('#select2').on('change', function(e) {
                        var data = $('#select2').select2("val");
                        @this.set('filterLocation', data);
                    });
                });
            </script>
        @endscript
    </div>
