@extends('layouts.navbar')

@section('content')
<div class="row">
  <div class="col-sm-8 col-md-9 col-lg-10">
    <div class="well well-asset-options clearfix">

      <div class="btn-toolbar btn-toolbar-media-manager pull-left" role="toolbar">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Share</button>
          <button type="button" class="btn btn-default"><i class="fa fa-download"></i> Download</button>
        </div>
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default disabled"><i class="fa fa-pencil"></i> Edit</button>
          <button type="button" class="btn btn-default disabled"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </div><!-- btn-toolbar -->

      <div class="btn-group pull-right" data-toggle="buttons">
        <label class="btn btn-default-active active">
          <input type="checkbox" checked=""> All
        </label>
        <label class="btn btn-default-active">
          <input type="checkbox"> Images
        </label>
        <label class="btn btn-default-active">
          <input type="checkbox"> Videos
        </label>
        <label class="btn btn-default-active">
          <input type="checkbox"> Documents
        </label>
        <label class="btn btn-default-active">
          <input type="checkbox"> Music
        </label>
      </div>

    </div>

    <div class="row filemanager">

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 audio">
        <div class="thmb">
          <label class="ckbox" style="display: none;">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group" style="display: none;">
            <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right fm-menu" role="menu">
              <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
              <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
              <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
              <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
            </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{ asset('asset/img/mp3.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">Happy.mp3</a></h5>
          <small class="text-muted">Added: July 1, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 document">
        <div class="thmb">
          <label class="ckbox" style="display: none;">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group" style="display: none;">
            <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right fm-menu" role="menu">
              <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
              <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
              <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
              <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
            </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{asset('asset/img/doc.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">MyDocuments.doc</a></h5>
          <small class="text-muted">Added: July 1, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 image">
        <div class="thmb">
          <label class="ckbox" style="display: none;">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group" style="display: none;">
            <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right fm-menu" role="menu">
              <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
              <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
              <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
              <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
            </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <a href="">
              <img src="{{asset('asset/img/png.png')}}" class="img-responsive" alt="">
            </a>
          </div>
          <h5 class="fm-title"><a href="">GreatCity.png</a></h5>
          <small class="text-muted">Added: June 30, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 video">
        <div class="thmb">
          <label class="ckbox" style="display: none;">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group" style="display: none;">
            <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu pull-right fm-menu" role="menu">
              <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
              <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
              <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
              <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
            </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{asset('asset/img/mp4.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">InTheSea.mp4</a></h5>
          <small class="text-muted">Added: June 30, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 document">
        <div class="thmb">
          <label class="ckbox">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{asset('asset/img/doc.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">MyDocuments.doc</a></h5>
          <small class="text-muted">Added: Jan 03, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 image">
        <div class="thmb">
          <label class="ckbox" style="display: none;">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group" style="display: none;">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <a href="">
              <img src="{{asset('asset/img/png.png')}}" class="img-responsive" alt="">
            </a>
          </div>
          <h5 class="fm-title"><a href="">Vegetarian.png</a></h5>
          <small class="text-muted">Added: Jan 02, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 video">
        <div class="thmb">
          <label class="ckbox" style="display: none;">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group" style="display: none;">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{asset('asset/img/mp4.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">DogAnimation.mp4</a></h5>
          <small class="text-muted">Added: Jan 02, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 audio">
        <div class="thmb">
          <label class="ckbox">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{ asset('asset/img/mp3.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">WreckingBall.mp3</a></h5>
          <small class="text-muted">Added: Jan 01, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 image">
        <div class="thmb">
          <label class="ckbox">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <a href="">
              <img src="{{asset('asset/img/png.png')}}" class="img-responsive" alt="">
            </a>
          </div>
          <h5 class="fm-title"><a href="">MyFirstArt.png</a></h5>
          <small class="text-muted">Added: Jan 01, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 document">
        <div class="thmb">
          <label class="ckbox">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{ asset('asset/img/docx.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">MyResume.docx</a></h5>
          <small class="text-muted">Added: Jan 01, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 video">
        <div class="thmb">
          <label class="ckbox" style="display: none;">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group" style="display: none;">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{asset('asset/img/mp4.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">MyFirstMovie.mp4</a></h5>
          <small class="text-muted">Added: Jan 01, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 image">
        <div class="thmb">
          <label class="ckbox" style="display: none;">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group" style="display: none;">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <a href="">
              <img src="{{asset('asset/img/png.png')}}" class="img-responsive" alt="">
            </a>
          </div>
          <h5 class="fm-title"><a href="">MeAndFriends.png</a></h5>
          <small class="text-muted">Added: Jan 01, 2015</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 audio">
        <div class="thmb">
          <label class="ckbox">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{ asset('asset/img/mp3.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">IWillSurvive.mp3</a></h5>
          <small class="text-muted">Added: Dec 31, 2014</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 document">
        <div class="thmb">
          <label class="ckbox">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{asset('asset/img/doc.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">MyDocuments.doc</a></h5>
          <small class="text-muted">Added: Dec 31, 2014</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 image">
        <div class="thmb">
          <label class="ckbox">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <a href="">
              <img src="{{asset('asset/img/png.png')}}" class="img-responsive" alt="">
            </a>
          </div>
          <h5 class="fm-title"><a href="">GreatCity.png</a></h5>
          <small class="text-muted">Added: Dec 30, 2014</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

      <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 video">
        <div class="thmb">
          <label class="ckbox">
            <input type="checkbox"><span></span>
          </label>
          <div class="btn-group fm-group">
              <button type="button" class="btn btn-default dropdown-toggle fm-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu pull-right fm-menu" role="menu">
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
          </div><!-- btn-group -->
          <div class="thmb-prev">
            <img src="{{asset('asset/img/mp4.png')}}" class="img-responsive" alt="">
          </div>
          <h5 class="fm-title"><a href="">InTheSea.mp4</a></h5>
          <small class="text-muted">Added: Dec 30, 2014</small>
        </div><!-- thmb -->
      </div><!-- col-xs-6 -->

    </div><!-- row -->
  </div><!-- col-sm-9 -->
  <div class="col-sm-4 col-md-3 col-lg-2">
    <div class="fm-sidebar">

      <button class="btn btn-danger btn-quirk btn-block mb20">Upload Files</button>

      <div class="panel">
        <div class="panel-heading">
          <h4 class="panel-title">Folders</h4>
        </div>
        <div class="panel-body">
          <ul class="folder-list">
            <li><a href=""><i class="fa fa-folder-open"></i> My Pictures</a></li>
            <li><a href=""><i class="fa fa-folder-open"></i> Facebook Photos</a></li>
            <li><a href=""><i class="fa fa-folder-open"></i> My Collection</a></li>
            <li><a href=""><i class="fa fa-folder-open"></i> Illustrations</a></li>
            <li><a href=""><i class="fa fa-folder-open"></i> TV Series</a></li>
            <li><a href=""><i class="fa fa-folder-open"></i> Downloaded Movies</a></li>
            <li><a href=""><i class="fa fa-folder-open"></i> E-book</a></li>
          </ul>
        </div>
      </div>

      <br>

      <h4 class="panel-title mb20">Tags</h4>
      <ul class="tag-list">
        <li><a href="">Animation</a></li>
        <li><a href="">Design</a></li>
        <li><a href="">Trailer</a></li>
        <li><a href="">Short Film</a></li>
        <li><a href="">Dubstep</a></li>
        <li><a href="">Soundtrack</a></li>
        <li><a href="">Photography</a></li>
        <li><a href="">Macro</a></li>
        <li><a href="">Tuturials</a></li>
        <li><a href="">Documentation</a></li>
      </ul>

      <div class="mb30 clearfix"></div>

      <h4 class="panel-title mb10">Credit</h4>
      <small class="text-muted">Icons by <a href="https://www.iconfinder.com/iconsets/hawcons">Hawcons</a></small>

    </div>
  </div><!-- col-sm-3 -->
</div>
@endsection