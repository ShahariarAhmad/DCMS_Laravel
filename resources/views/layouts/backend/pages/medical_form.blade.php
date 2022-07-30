@extends('layouts.backend.layout',[$page_title])
@section('content')
<div class="col-10 p-5 shadow">

    @if (session()->has('history'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('history') }}
        </div>
    @endif



    <form action="{{ route('Dashboard_submit_mcq') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6 card p-0 mt-5">
                <div class="card-header bg-success text-white">
                    Meical history
                </div>


                <div class="card-body shadow">
                    @foreach ($question as $value)

                        @if ($value['type'] == 'medical')

                            <div class="pt-2 px-4">
                                <p>
                                    {{ $value['question'] }}
                                </p>
                                <ul class="list-unstyled pl-3">
                                    @foreach ($history as $option)
                                        @if ($value['question'] == $option['question'])
                                            <li>
                                            
                                                <input name="mcq[]" type="checkbox"
                                                    value="{{ $value['id'] }},{{ $option['id'] }}">
                                                <span class="pl-3">
                                                    {{ $option['list'] }}
                                                </span>

                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach


                </div>
            </div>
            <div class="col-6 card p-0 mt-5 ml-auto">
                <div class="card-header bg-success text-white">
                    Social History
                </div>
                <div class="card-body shadow">
                    @foreach ($question as $value)

                        @if ($value['type'] == 'social')

                            <div class="pt-2 px-4">
                                <p>
                                    {{ $value['question'] }}
                                </p>
                                <ul class="list-unstyled pl-3">
                                    @foreach ($history as $option)
                                        @if ($value['question'] == $option['question'])
                                            <li>
                                                {{-- socialHistoryData[] --}}

                                                <input name="mcq[]" type="checkbox"
                                                    value="{{ $value['id'] }},{{ $option['id'] }}">
                                                <span class="pl-3">
                                                    {{ $option['list'] }}
                                                </span>

                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    @endforeach
                </div>
            </div>
            <input type="submit" value="Submit" name="ms" class="btn btn-success">
        </div>
    </form>

    <form action="{{ route('Dashboard_submit_mcq') }}" method="post">
        @csrf
        <div class="row mt-5">
            <div class="card p-0 shadow col-12">
                <div class="card-header bg-success text-white">
                    তালিকার তে যে সকল রোগের নাম উল্লেখ্য করা আছে, তার মধ্য থেকে যে রোগ গুলো আপনার আছে সে গুলো সিলেক্ট
                    করুন।
                </div>
                <div class="row p-4">
                    <div class="col-5">
                        <div class="card mt-4">
                            <div class="card-header">
                                কমন অসুখ
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'common')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                হৃদপিণ্ড / রক্তের প্রবাহ
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'heart_and_blood')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                Musculoskeletal
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'musculoskeletal')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                স্নায়ু তন্ত্র
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'nervous_system')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                চোখের সমস্যা
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'eye')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                নাক / কান / গলা
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'nose_ear_throat')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                ত্বক
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'skin')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="col-5 ">
                        <div class="card mt-4">
                            <div class="card-header">
                                প্রজনন
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'reproductive')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                শ্বাস প্রশ্বাস
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'breathing')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                Gastrontestinal
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'gastrontestinal')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                Psychiatric
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'psychiatric')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                রক্ত
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'blood')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                Endocrine
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'endocrine')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif

                                @endforeach
                            </ul>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header">
                                Genital and urinary
                            </div>
                            <ul class="list-unstyled pl-3 pt-3">
                                @foreach ($mcq as $list)
                                    @if ($list['category'] == 'genital_and_urinary')
                                        <li>
                                            <input name="mcq[]" type="checkbox" value="{{ $list['id'] }}">
                                            <span class="pl-3">
                                                {{ $list['name'] }}
                                            </span>

                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                    </div>
                  

                </div>
                  <input type="submit" value="Submit" name="sick" class="btn btn-success">
            </div>
        </div>
    </form>
</div>

@endsection
