 
     <div class="sidebar-filters">
         <div class="filter-block head-border mb-30">
             <h5>Advance Filter <a class="link-reset" wire:click="resetFilters" href="">Reset</a></h5>
         </div>
         <div class="filter-block mb-30">
             <div class="form-group select-style select-style-icon">
                 <div wire:ignore>
                     <select class="form-control form-icons " wire:model="filterLocation" id="select2"  style="width: 100%;" >
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
             <div class="ps-custom-scrollbar">
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
                                     value="{{ $departement->id }}" class="departement-checkbox" checked="checked"><span
                                     class="text-small">{{ $departement->name }}</span><span class="checkmark"></span>
                             </label><span class="number-item">{{ $departement->careers_count }}</span>
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
                             <span class="font-sm color-brand-1">
                                 MAX</span>
                         </div>
                     </div>
                 </div>
             </div>

         </div>

         <div class="filter-block mb-30">
             <h5 class="medium-heading mb-10">Experience Level</h5>
             <div class="fps-custom-scrollbar">
                 <ul class="list-checkbox">
                     @foreach ($levels as $level)
                         <li>
                             <label class="cb-container">
                                 <input type="checkbox" wire:model.live="filterLevel" value="{{ $level->id }}"><span
                                     class="text-small">{{ $level->name }}</span><span class="checkmark"></span>
                             </label><span class="number-item">{{ $level->careers_count }}</span>
                         </li>
                     @endforeach
                 </ul>
             </div>
         </div>
         <div class="filter-block mb-30">
             <h5 class="medium-heading mb-10">Onsite</h5>
             <div class="ps-custom-scrollbar">
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
             <div class="ps-custom-scrollbar">
                 <ul class="list-checkbox">
                     @foreach ($types as $type)
                         <li>
                             <label class="cb-container">
                                 <input type="checkbox" wire:model.live="filterType" value="{{ $type->id }}"><span
                                     class="text-small">{{ $type->name }}</span><span class="checkmark"></span>
                             </label><span class="number-item">{{ $type->careers_count }}</span>
                         </li>
                     @endforeach
                 </ul>
             </div>
         </div>
     </div>

