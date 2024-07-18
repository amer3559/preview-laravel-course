@if(count($errors->all()))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

{{--@if(Session::get('success', false))--}}
{{--    <?php $data = Session::get('success'); ?>--}}
{{--    @if (is_array($data))--}}
{{--        @foreach ($data as $msg)--}}
{{--            <div class="alert alert-success" role="alert" style="display: flex; justify-content: space-between;">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">--}}
{{--                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>--}}
{{--                    <path d="M5 12l5 5l10 -10"></path>--}}
{{--                </svg>--}}
{{--                {{ $msg }}--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    @else--}}
{{--        <div class="alert alert-success" role="alert">--}}
{{--            <i class="fa fa-check"></i>--}}
{{--            {{ $data }}--}}
{{--            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--@endif--}}
