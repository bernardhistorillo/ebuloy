@extends("layouts.layout")

@section("title")
Home
@stop

@section("content")
    <div id="overlay"></div>

    <form id="create-campaign-form" onsubmit="return false">
        <div class="page" data-name="home" data-order="1">
            <div class="wrapper">
                <div class="text-center pt-4">
                    <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                </div>

                <div class="my-3 pt-2">
                    <p class="pages-header font-size-150 mb-3">The Deceased</p>
                    <p class="pages-sub-header font-size-80">PERSONAL INFORMATION</p>
                </div>

                <div class="text-center">
                    <div class="page-number mr-3 active">1</div>
                    <a href="#page-2" class="page-number mr-3">2</a>
                    <a href="#page-2" class="page-number">3</a>
                </div>

                <div class="pt-4">
                    <div class="form-group mb-2">
                        <p>First Name</p>
                        <input type="text" class="form-control" name="first_name" placeholder="Juan" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Last Name</p>
                        <input type="text" class="form-control" name="last_name" placeholder="De La Cruz" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Date of Birth</p>
                        <input type="date" class="form-control" name="date_of_birth" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Date of Death</p>
                        <input type="date" class="form-control" name="date_of_death" />
                    </div>

                    <p class="pages-sub-header mt-4 pt-2 font-size-80">Upload recent photo of the deceased.</p>

                    <div class="text-center">
                        <div id="upload-photo">
                            <div>+</div>
                        </div>
                    </div>
                </div>

                <div class="pt-4 mt-3 px-4">
                    <a href="#page-2" class="btn c-btn c-btn-3 mb-3">Next<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <div class="page cached" data-name="page-2" data-order="2">
            <div class="wrapper">
                <div class="text-center pt-4">
                    <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                </div>

                <div class="my-3 pt-2">
                    <p class="pages-header font-size-150 mb-3">The Deceased</p>
                    <p class="pages-sub-header font-size-80">INTERMENT INFORMATION</p>
                </div>

                <div class="text-center">
                    <div class="page-number mr-3 go-back">1</div>
                    <div class="page-number active mr-3">2</div>
                    <a href="#page-3" class="page-number">3</a>
                </div>

                <div class="pt-4">
                    <div class="form-group mb-2">
                        <p>Funeral</p>
                        <input type="text" class="form-control" name="funeral" placeholder="St. Peters" />
                    </div>
                </div>

                <p class="pages-sub-header text-left mt-3 mb-2 font-size-80">Campaign Duration</p>
                <div class="form-group mb-2">
                    <p>Start of Campaign</p>
                    <input type="date" class="form-control" name="start_of_campaign" />
                </div>
                <div class="form-group mb-2">
                    <p>End of Campaign</p>
                    <input type="date" class="form-control" name="end_of_campaign" />
                </div>

                <p class="pages-sub-header text-left mt-3 mb-2 font-size-80">Address</p>
                <div class="form-group mb-2">
                    <p>Street</p>
                    <input type="text" class="form-control" name="street" placeholder="123 Street" />
                </div>
                <div class="form-group mb-2">
                    <p>City</p>
                    <input type="text" class="form-control" name="street" placeholder="Legazpi" />
                </div>
                <div class="form-group mb-2">
                    <p>Province</p>
                    <input type="text" class="form-control" name="province" placeholder="Albay" />
                </div>
                <div class="form-group mb-2">
                    <p>Postal Code</p>
                    <input type="text" class="form-control" name="postal_code" placeholder="4500" />
                </div>

                <div class="pt-4 mt-4 px-4">
                    <a href="#page-3" class="btn c-btn c-btn-3 mb-3">Next<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <div class="page cached" data-name="page-3" data-order="3">
            <div class="wrapper">
                <div class="text-center pt-4">
                    <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                </div>

                <div class="my-3 pt-2">
                    <p class="pages-header font-size-150 mb-3">The Deceased</p>
                    <p class="pages-sub-header font-size-80">THE STORY</p>
                </div>

                <div class="text-center">
                    <div class="page-number mr-3 go-back">1</div>
                    <div class="page-number mr-3 go-back">2</div>
                    <div class="page-number active">3</div>
                </div>

                <div class="pt-4">
                    <div class="form-group mb-2">
                        <p>Write a short story of the deceased.</p>
                        <textarea type="text" class="form-control" name="funeral" placeholder="Story"></textarea>
                    </div>
                </div>

                <p class="mt-4" id="save-as-draft">Save as draft</p>

                <div class="pt-3 px-4">
                    <button class="btn c-btn c-btn-3 mb-3">Preview<i class="fas fa-chevron-right"></i></button>
                    <button class="btn c-btn c-btn-4 mb-3">Publish<i class="fas fa-chevron-right text-white"></i></button>
                </div>
            </div>
        </div>
    </form>
@stop
