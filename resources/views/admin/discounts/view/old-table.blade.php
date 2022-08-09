<div class="card-body" id="table_data">
    <p class="card-title"></p>
    <table class="table table-hover" id="dataTables-example" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date</th>
                <th>Status</th>
                <th>Edit</th>


            </tr>
        </thead>
        <tbody>

            @if(isset($data) && count($data)>0)
            @foreach($data as $key=> $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->created_at->format('d/m/Y')}}</td>
                @if($item->status == 1)
                <td>
                    <img src="{{asset('public/assets/img/success.png')}}" class="status-success" />
                </td>
                @elseif($item->status == 2)
                <td>
                    <img src="{{asset('public/assets/img/expired.png')}}" class="status-faild" />
                </td>
                @elseif($item->status == 3)
                <td>
                    <img src="{{asset('public/assets/img/faild.png')}}" class="status-faild" />
                </td>
                @endif
                <td><a href="{{url('admin/application/edit').'/'.$item->id}}"><i class="fas fa-pencil-alt"></i></a></td>

            </tr>
            @endforeach
            @endif




        </tbody>
    </table>

    <div class="row">
        <div align="center">
            {{ $data->links() }}
        </div>
    </div>
</div>