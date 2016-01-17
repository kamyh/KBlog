<div id="{{$type . $target}}" class="panel panel-default comment-hide">
    <div class="panel-heading">{{ trans('interface.comment') }}</div>
    <div class="panel-body">

        <form enctype="multipart/form-data"
              role="form"
              method="POST"
              accept-charset="utf-8"
              action="{{ url('/comment/create') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="comment_id" value="{{ $target }}">

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control"
                       placeholder="{{ trans('interface.name') }}"
                       aria-describedby="basic-addon1" name="name"
                       value="{{old('name')}}">
                <span class="input-group-addon" id="basic-addon1">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control"
                       placeholder="{{ trans('interface.email') }}"
                       aria-describedby="basic-addon1" name="email"
                       value="{{old('email')}}">
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                    <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                </span>
                <input type="text" class="form-control"
                       placeholder="{{ trans('interface.website') }}"
                       aria-describedby="basic-addon1" name="website"
                       value="{{old('website')}}">
                                            <span class="input-group-addon" id="basic-addon1">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </span>
                <input type="text" class="form-control"
                       placeholder="{{ trans('interface.text') }}"
                       aria-describedby="basic-addon1" name="text"
                       value="{{old('text')}}">
            </div>

            <button type="submit"
                    class="btn-clean">{{ trans('interface.comment') }}</button>

        </form>
    </div>
</div>