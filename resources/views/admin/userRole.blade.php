@extends('template.default')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th class="col">#ID</th>
                    <th class="col">TITRE DU POSTE</th>
                    <th class="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rules as $rule)
                    <tr>
                        <td>{{$rule->id}}</td>
                        <td>{{$rule->title}}</td>
                        <td>
                            <form action="{{route('suprole', $rule)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">SUP</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection