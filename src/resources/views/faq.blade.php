@extends('layouts.default')
@section('title', 'RMIT Ticketing')
@section('content')
    <div class="container">
        <h1 class="display-4 py-5">FAQ</h1>
        <div class="container">
            <div id="accordion" class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question1">
                        <h4 class="panel-title">
                            <a href="#" class="in">
                                Q: How long can I expect until I receive a response?
                            </a>
                        </h4>
                    </div>
                    <div id="question1" class="panel-collapse collapse">
                        <div class="panel-body" style="padding-top: 10px; padding-bottom: 15px;">
                            Your ticket will be viewed upon the same day as submission but depending on the solution for that task,
                            the waiting day may be up to 5 business days.
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question2">
                        <h4 class="panel-title">
                            <a href="#" class="in">
                                Q: Do I need to be a student to use the ticketing system?
                            </a>
                        </h4>
                    </div>
                    <div id="question2" class="panel-collapse collapse">
                        <div class="panel-body" style="padding-top: 10px; padding-bottom: 15px;">
                            No. Anyone can use the RMIT ticketing system. If you login as a student the personal details aspect of the form will be
                            automatically filled.
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question3">
                        <h4 class="panel-title">
                            <a href="#" class="in">
                                Q: What if my problem does not fit into any of the selections?
                            </a>
                        </h4>
                    </div>
                    <div id="question3" class="panel-collapse collapse">
                        <div class="panel-body" style="padding-top: 10px; padding-bottom: 15px;">
                            ...
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question4">
                        <h4 class="panel-title">
                            <a href="#" class="in">
                                Q: Can I talk to an individual instead of submitting a ticket online?
                            </a>
                        </h4>
                    </div>
                    <div id="question4" class="panel-collapse collapse">
                        <div class="panel-body" style="padding-top: 10px; padding-bottom: 15px;">
                            Yes. If you prefer to talk to a staff in person please visit the IT service desk in building 80, level 2. Opening hours 9am-5pm.
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#question5">
                        <h4 class="panel-title">
                            <a href="#" class="in">
                                Q: If i accidentally remove a ticket that is pending can i undo it?
                            </a>
                        </h4>
                    </div>
                    <div id="question5" class="panel-collapse collapse">
                        <div class="panel-body" style="padding-top: 10px; padding-bottom: 15px;">
                            No. Unfortunately if you withdraw a request it is deleted off the database therefore you will need to resubmit a request.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
