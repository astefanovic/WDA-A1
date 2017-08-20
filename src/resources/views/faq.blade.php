@extends('layouts.default')
@section('title', 'RMIT Ticketing')
@section('content')
    <div class="container">
        <h1 class="display-4 py-5">FAQ</h1>
        <div class="container">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How long can I expect until I receive a response?
                            </a>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block">
                            Your ticket will be viewed upon the same day as submission but depending on the solution for that task,
                            the waiting day may be up to 5 business days.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Do I need to be a student to use the ticketing system?
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="card-block">
                            No. Anyone can use the RMIT ticketing system. If you login as a student the personal details aspect of the form will be
                            automatically filled.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                What if my problem does not fit into any of the selections?
                            </a>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="card-block">
                            Well, too bad.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingFour">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Can I talk in person instead of submitting a ticket online?
                            </a>
                        </h5>
                    </div>
                    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="card-block">
                            Yes. If you prefer to talk to a person please visit the IT service desk in building 80, level 2. Opening hours 9am-5pm.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
