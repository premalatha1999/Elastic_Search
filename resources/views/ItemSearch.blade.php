<html>
<body>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-primary" style="text-align: center;"> Use of Elasticsearch for Search in Laravel</h1>
    </div>
</div>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-lg-6">
                    <form method="post" action="{{url('/')}}/ItemSearch">
                        <div class="input-group">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input name="search" value="{{ old('search') }}" type="text" class="form-control"
                                   placeholder="Search for...">
                            <span class="input-group-btn"><button class="btn btn-default"
                                                                  type="submit">Go!</button></span>
                            <button type="button"><a href="{{url('/')}}/refresh_data">Refresh Data</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    @if(!empty($items))
                        @foreach($items as $key => $value)
                            <h3 class="text-danger">{{ $value['title'] }}</h3>
                            <p>{{ $value['description'] }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
