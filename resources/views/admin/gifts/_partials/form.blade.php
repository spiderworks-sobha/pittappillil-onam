<div class="content">
    <div class="container">
        <div class="page-title">
            @if($obj->id)
                <h3 class="text-uppercase">Edit Gift <a href="{{route($route.'.create')}}" class="btn btn-sm btn-light show-form-modal">Add new Gift</a></h3>
                
            @else
                <h3 class="text-uppercase">Add new Gift</h3>
            @endif
        </div>
        <div class="row">

            <div id="success-holder" style="display:none;" class="alert alert-success alert-dismissible fade show">
                
            </div>

            <div class="col-lg-12">
                <div class="card no-border aster-card">
                    <div class="card-body">
                            @if($obj->id)
                                <form method="POST" action="{{ route($route.'.update') }}" class="p-t-15" id="InputFrm" data-validate=true>
                            @else
                                <form method="POST" action="{{ route($route.'.store') }}" class="p-t-15" id="InputFrm" data-validate=true>
                            @endif
                                @csrf
                                <input type="hidden" name="id" @if($obj->id) value="{{encrypt($obj->id)}}" @endif id="inputId">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="input" class="form-control" id="name" name="name" value="{{$obj->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="probability">Probability</label>
                                    <input type="number" class="form-control" id="probability" name="probability" value="{{$obj->probability}}">
                                </div>
                                <div class="form-group">
                                    <label for="is_special_gift">Gift Type</label>
                                    <select class="form-select" id="is_special_gift" name="is_special_gift">
                                        <option value="0">Normal</option>
                                        <option value="1" @if($obj->is_special_gift == 1) selected="selected" @endif>Special</option>
                                    </select>
                                </div>
                                <div class="">
                                    <div class="col-sm-12">
                                        <div id="errors-holder" style="display:none;" class="alert alert-danger alert-dismissible fade show">
                                            <strong>Error!</strong>
                                            <p id="errors"></p>
                                        </div>
                                        <div class="lead-button-block">
                                            <div>
                                                <a id="close-modal" data-dismiss="modal" class="btn btn-secondary mb-2 lead-cancel-btn"><i class="fas fa-times"></i> Cancel</a>
                                                <button type="submit" class="btn btn-primary mb-2 lead-update-btn" id="submit-btn"><i class="fas fa-save"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>