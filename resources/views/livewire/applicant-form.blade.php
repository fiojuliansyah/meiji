<div>
    <div class="modal fade" id="ModalApplyJobForm-{{$careerId}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body pl-30 pr-30 pt-50">
                    <div class="text-center">
                        <p class="font-sm text-brand-2 badge badge-primary ">Job Application </p>
                    </div>
                    <form wire:submit.prevent="submit" enctype="multipart/form-data">
                        <input type="hidden" value="{{$careerId}}">
                        <div class="form-group">
                            <label for="fullname">Full Name *</label>
                            <input wire:model="fullname" type="text" id="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Enter your full name">
                            @error('fullname') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input wire:model="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email">
                            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input wire:model="phone" type="text" id="phone" class=" @error('phone') is-invalid @enderror" placeholder="Enter your phone number">
                            @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="document    ">Upload Resume (optional)</label>
                            <input wire:model="document" type="file" class=" form-control @error('document') is-invalid @enderror">
                            @error('resume') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100">Submit Application</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>