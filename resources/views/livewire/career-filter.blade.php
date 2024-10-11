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
                                          <div class="box-border mr-10"><span class="text-sortby">Show:</span>
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
                                                  <button class="btn dropdown-toggle" id="dropdownSort2" type="button"
                                                      data-bs-toggle="dropdown" aria-expanded="false"
                                                      data-bs-display="static"><span>{{ $this->sortDirection == 'desc' ? 'Newest Post' : 'Oldest Post' }}</span><i
                                                          class="fi-rr-angle-small-down"></i></button>
                                                  <ul class="dropdown-menu dropdown-menu-light"
                                                      aria-labelledby="dropdownSort2">
                                                      <li><a class="dropdown-item {{ $this->sortDirection == 'desc' ? 'active' : '' }}"
                                                              href="" wire:click="sortNewest()">Newest Post</a>
                                                      </li>
                                                      <li><a class="dropdown-item {{ $this->sortDirection == 'asc' ? 'active' : '' }}"
                                                              href="" wire:click="sortOldest()">Oldest Post</a>
                                                      </li>
                                                  </ul>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              @foreach ($careers as $career)
                              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                  <div class="card-grid-2 hover-up">
                                      <div class="card-grid-2-image-left"><span class="flash"></span>
                                          <div class="image-box"><img
                                                  src="{{ $career->departement->img_url ?? 'assets/media/logos/logo-meiji-1.png' }}"
                                                  alt="jobBox"></div>
                                          <div class="right-info"><a class="name-job"
                                                  href="company-details.html">{{ $career->name }}</a><span
                                                  class="location-small">{{ $career->location->name }}</span></div>
                                      </div>
                                      <div class="card-block-info">
                                          <h6><a href="job-details.html">{{ $career->departement->name }}</a></h6>
                                          <div class="mt-5"><span
                                                  class="card-briefcase">{{ $career->type->name }}</span><span
                                                  class="card-time">{{ $career->created_at->diffForHumans() }}</span>
                                          </div>
                                          <div class="font-sm color-text-paragraph mt-15"
                                              style="text-align:justify;display: -webkit-box;-webkit-line-clamp: 5;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;">
                                              {!! $career->description !!} </div>
                                          <div class="card-2-bottom mt-30">
                                              <div class="row">
                                                  <div class="col-lg-7 col-7"><span
                                                          class="card-text-price fs-6">Rp.{{ number_format($career->salary, 0, ',', '.') }}</span>
                                                  </div>
                                                  <div class="col-lg-5 col-5 text-end">
                                                      <div class="btn btn-apply-now  me-6" data-bs-toggle="modal"
                                                          data-bs-target="#ModalApplyJobForm">Apply now</div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              @endforeach
                          </div>
                      </div>
                      <div class="paginations">
                          <ul class="pager">
                              {{-- Menampilkan link pagination Livewire --}}
                              @if ($careers)
                              <li class="pager-prev">
                                  @if ($careers->onFirstPage())
                                  <a href="{{ $careers->previousPageUrl() }}" class="pager-prev btn disabled"
                                      aria-disabled="true"></a>
                                  @else
                                  <a href="{{ $careers->previousPageUrl() }}" class="pager-prev "></a>
                                  @endif
                              </li>

                              @foreach ($careers->getUrlRange(1, $careers->lastPage()) as $page => $url)
                              <li>
                                  @if ($page == $careers->currentPage())
                                  <a href="{{ $url }}" class="pager-number btn disabled"
                                      aria-disabled="">{{ $page }}</a>
                                  @else
                                  <a href="{{ $url }}"
                                      class="pager-number">{{ $page }}</a>
                                  @endif
                              </li>
                              @endforeach

                              <li class="pager-next">
                                  @if ($careers->hasMorePages())
                                  <a href="{{ $careers->nextPageUrl() }}" class="pager-next "></a>
                                  @else
                                  <a href="{{ $careers->nextPageUrl() }}" class="pager-next btn disabled"></a>
                                  @endif
                              </li>
                              @endif
                          </ul>
                      </div>

                  </div>
                  <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                      <div class="sidebar-shadow none-shadow mb-30">
                          <div class="sidebar-filters">
                              <div class="filter-block head-border mb-30">
                                  <h5>Advance Filter <a class="link-reset" wire:click="resetFilters"
                                          href="">Reset</a></h5>
                              </div>
                              <div class="filter-block mb-30">
                                  <div class="form-group select-style select-style-icon">
                                      <div wire:ignore>
                                          <select class="form-control form-icons" wire:model="filterLocation"
                                              id="select2">
                                              <option value="">Select Location</option>
                                              @foreach ($locations as $location)
                                              <option value="{{ $location->name }}">{{ $location->name }}
                                              </option>
                                              @endforeach
                                          </select><i class="fi-rr-marker"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="filter-block mb-20">
                                  <h5 class="medium-heading mb-15">Departement</h5>
                                  <div class="form-group">
                                      <ul class="list-checkbox">
                                          <li>
                                              <label class="cb-container">
                                                  <input type="checkbox" class="all-checkbox" checked="checked">
                                                  <span class="text-small">All</span><span class="checkmark"></span>
                                              </label><span class="number-item">{{ $totalCareers }}</span>
                                          </li>
                                          @foreach ($departements as $departement)
                                          <li>
                                              <label class="cb-container">
                                                  <input type="checkbox" wire:model.live="filterDepartement"
                                                      value="{{ $departement->id }}" class="departement-checkbox"
                                                      checked="checked"><span
                                                      class="text-small">{{ $departement->name }}</span><span
                                                      class="checkmark"></span>
                                              </label><span
                                                  class="number-item">{{ $departement->careers_count }}</span>
                                          </li>
                                          @endforeach
                                      </ul>

                                  </div>
                              </div>
                              <div class="filter-block mb-20">
                                  <h5 class="medium-heading mb-10">Salary Range</h5>
                                  <div class="list-checkbox pb-20">

                                      <div class="">
                                          <div class="row">
                                              <div class="col-sm-6 col-6 text-center">
                                                  <span>
                                                      <input type="text" wire:model.live="minSalary" class="form-control">
                                                  </span>
                                                  <span class="font-sm color-brand-1">
                                                      MIN
                                                  </span>

                                              </div>
                                              <div class="col-sm-6 col-6 text-center">
                                                  <span>
                                                      <input type="text" wire:model.live="maxSalary" class="form-control">
                                                  </span>
                                                  <span
                                                      class="font-sm color-brand-1">
                                                      MAX</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                              </div>

                              <div class="filter-block mb-30">
                                  <h5 class="medium-heading mb-10">Experience Level</h5>
                                  <div class="form-group">
                                      <ul class="list-checkbox">
                                          @foreach ($levels as $level)
                                          <li>
                                              <label class="cb-container">
                                                  <input type="checkbox" wire:model.live="filterLevel"
                                                      value="{{ $level->id }}"><span
                                                      class="text-small">{{ $level->name }}</span><span
                                                      class="checkmark"></span>
                                              </label><span class="number-item">{{ $level->careers_count }}</span>
                                          </li>
                                          @endforeach
                                      </ul>
                                  </div>
                              </div>
                              <div class="filter-block mb-30">
                                  <h5 class="medium-heading mb-10">Onsite</h5>
                                  <div class="form-group">
                                      <ul class="list-checkbox">
                                          @foreach ($placements as $placement)
                                          <li>
                                              <label class="cb-container">
                                                  <input type="checkbox" wire:model.live="filterPlacement"
                                                      value="{{ $placement->placement }}"><span
                                                      class="text-small">{{ $placement->placement }}</span><span
                                                      class="checkmark"></span>
                                              </label><span class="number-item">{{ $placement->count }}</span>
                                          </li>
                                          @endforeach
                                      </ul>
                                  </div>
                              </div>

                              <div class="filter-block mb-20">
                                  <h5 class="medium-heading mb-15">Job type</h5>
                                  <div class="form-group">
                                      <ul class="list-checkbox">
                                          @foreach ($types as $type)
                                          <li>
                                              <label class="cb-container">
                                                  <input type="checkbox" wire:model.live="filterType"
                                                      value="{{ $type->id }}"><span
                                                      class="text-small">{{ $type->name }}</span><span
                                                      class="checkmark"></span>
                                              </label><span class="number-item">{{ $type->careers_count }}</span>
                                          </li>
                                          @endforeach
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
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