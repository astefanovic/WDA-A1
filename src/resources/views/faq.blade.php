@extends('layouts.default')
@section('title', 'RMIT Ticketing')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-5">
                <h1 class="d-inline display-4">FAQ</h1>
                <hr class="pb-5">
            </div>
            <div class="container">
                <div id="accordion" class="panel-group">
                    <div class="panel panel-primary borderless-accordion">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question1">
                            <h4 class="panel-title">
                                <a href="#" class="in text-dark lead">
                                    Q: How long can I expect until I receive a response?
                                </a>
                            </h4>
                        </div>
                        <div id="question1" class="panel-collapse collapse">
                            <div class="panel-body">
                                Your ticket will be viewed upon the same day as submission but depending on the solution for that task,
                                the waiting day may be up to 5 business days.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary borderless-accordion">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question2">
                            <h4 class="panel-title">
                                <a href="#" class="in text-dark lead">
                                    Q: Do I need to be a student to use the ticketing system?
                                </a>
                            </h4>
                        </div>
                        <div id="question2" class="panel-collapse collapse">
                            <div class="panel-body">
                                No. Anyone can use the RMIT ticketing system. If you login as a student the personal details aspect of the form will be
                                automatically filled.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary borderless-accordion">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question3">
                            <h4 class="panel-title">
                                <a href="#" class="in text-dark lead">
                                    Q: What if my problem does not fit into any of the selections?
                                </a>
                            </h4>
                        </div>
                        <div id="question3" class="panel-collapse collapse">
                            <div class="panel-body">
                                ...
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary borderless-accordion">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question4">
                            <h4 class="panel-title">
                                <a href="#" class="in text-dark lead">
                                    Q: Can I talk to an individual instead of submitting a ticket online?
                                </a>
                            </h4>
                        </div>
                        <div id="question4" class="panel-collapse collapse">
                            <div class="panel-body">
                                Yes. If you prefer to talk to a staff in person please visit the IT service desk in building 80, level 2. Opening hours 9am-5pm.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary borderless-accordion">
                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question5">
                            <h4 class="panel-title">
                                <a href="#" class="in text-dark lead">
                                    Q: If i accidentally remove a ticket that is pending can i undo it?
                                </a>
                            </h4>
                        </div>
                        <div id="question5" class="panel-collapse collapse">
                            <div class="panel-body">
                                No. Unfortunately if you withdraw a request it is deleted off the database therefore you will need to resubmit a request.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
