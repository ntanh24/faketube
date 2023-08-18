<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Of Channels</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="margin-tb">
                <div class="pull-left">
                    <h2>List Of Channels</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('channels.create') }}"> Create Channel</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>ChannelName</th>
                <th>Description</th>
                <th>SubcribersCount</th>
                <th>URL</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($channels as $channel)
            <tr>
                <td>{{ $channel->id }}</td>
                <td>{{ $channel->ChannelName }}</td>
                <td>{{ $channel->Description }}</td>
                <td>{{ $channel->SubcribersCount }}</td>
                <td>{{ $channel->URL }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('channels.show',$channel->id) }}">Detail</a>
                    <a class="btn btn-primary" href="{{ route('channels.edit',$channel->id) }}">Edit</a>
                    <a class="btn btn-primary" href="#" data-id={{ $channel->id }} data-toggle="modal" data-target="#{{$channel->id}}">Delete</a>
                    <!-- Modal -->
                    <form action="{{ route('channels.destroy',$channel->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal fade" id="{{$channel->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Channel</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure delete the channel with id: {{$channel->id}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
