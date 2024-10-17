<div class="modal fade" id="ModalApplyJobForm-{{ $career->id ?? '' }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body pl-30 pr-30 pt-50">
                <div class="text-center">
                    <p class="font-sm text-brand-2 badge badge-primary ">Job Application </p>

                </div>

                <form class="login text-start mt-20 pb-30" action="{{route('apply-career')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="career_id" value="{{$career->id}}">
                    <div class=" form-group">
                        <label class="form-label" for="input-1">Full Name *</label>
                        <input class="form-control" id="input-1" type="text" required="" name="name"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-2">Email *</label>
                        <input class="form-control" id="input-2" type="email" required="" name="email"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="number">Phone Number *</label>
                        <input class="form-control" id="number" type="text" required="" name="phone"
                            placeholder="Enter your phone number">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="file">Upload Resume</label>
                        <input class="form-control" id="file" name="document" type="file">
                    </div>
                    <div class="login_footer form-group d-flex justify-content-between">
                        <label class="cb-container">
                            <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span
                                class="checkmark"></span>
                        </label><a class="text-muted" href="page-contact.html">Lean more</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default hover-up w-100" type="submit">Apply Job</button>
                    </div>
                    <div class="text-muted text-center">Do you need support? <a href="page-contact.html">Contact
                            Us</a></div>
                </form>
            </div>
        </div>
    </div>
</div>