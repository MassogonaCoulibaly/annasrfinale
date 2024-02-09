@extends('layouts.navbar')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-sm-8 ml-auto">
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">Input Fields</h4>
                    <p>Individual form controls automatically receive some global styling with
                        <code>.form-control</code> class that are set to 100% width by default.</p>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <input type="text" placeholder="Help Text" class="form-control">
                        <span class="help-block">A block of help text that breaks onto a new line and may extend beyond
                            one line.</span>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Help Text" class="form-control">
                        <span class="help-block">A block of help text that breaks onto a new line and may extend beyond
                            one line.</span>
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Help Text" class="form-control">
                        <span class="help-block">A block of help text that breaks onto a new line and may extend beyond
                            one line.</span>
                    </div>
                </div>
            </div><!-- panel -->

        </div>
    </div>
</div>

@endsection