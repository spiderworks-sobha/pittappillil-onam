@extends('email._layouts.base')
@section('content')

<tr>
    <td valign="middle" class="skyline skyline-2 bg_white">
        <table>
            <tbody>
                <tr>

            

                    <td>
                        <div class="thank-msg">
                            <h1>Aster Privilege Card Request</h1>
                        </div>

                        <p>You have received a privilege card request.Please check below link for more details.</p>

                        <table class="email-table">
                            <thead>

                                <tr>
                                    <td>Name: </td>
                                    <td> {{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td> {{$data->email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone: </td>
                                    <td> {{$data->phone}}</td>
                                </tr>

                                @if($data->locality)
                                <tr>
                                    <td>Locality: </td>
                                    <td> {{$data->locality}}</td>
                                </tr>
                                @endif
                            </thead>


                        </table>
                        <br>
                        <br>

                        <!--<p style="text-align:center"><a style="border: none;color: #27a4da;" href="{{url('admin')}}">View Details</a></p>-->
                        <button class="email-btn"><a href="{{url('admin')}}">View Details</a></button>


                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

@endsection