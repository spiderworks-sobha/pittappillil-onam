<div class="content">
    <div class="container">
        <div class="page-title">
            <h3 class="text-uppercase">Update Claim Status</h3>
        </div>
        <div class="row">

            <div id="success-holder" style="display:none;" class="alert alert-success alert-dismissible fade show">
                
            </div>

            <div class="col-lg-12">
                <div class="card no-border aster-card">
                    <div class="card-body">
                                <form method="POST" action="{{ route($route.'.update') }}" class="p-t-15" id="InputFrm" data-validate=true>
                                @csrf
                                <input type="hidden" name="id" @if($obj->id) value="{{encrypt($obj->id)}}" @endif id="inputId">
                                <div class="form-group">
                                    <label for="invoice">Name: </label>
                                    <b>{{$obj->name}}</b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Invoice: </label>
                                    <b>{{$obj->invoice}}</b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Phone Number: </label>
                                    <b>{{$obj->phone_number}}</b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Gift: </label>
                                    <b>{{$obj->gift->name}}</b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Submitted On: </label>
                                    <b>{{date('d M, Y h:i A', strtotime($obj->created_at))}}</b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" id="claim_status" name="claim_status">
                                        <label class="form-check-label" for="claim_status">
                                            Mark as Claimed
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="note">Note </label>
                                    <textarea class="form-control" id="note" name="note" rows="2"></textarea>
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
                                                <button type="button" class="btn btn-primary mb-2 lead-update-btn" id="submit-btn" disabled><i class="fas fa-save"></i> Submit</button>
                                                <a href="{{route($route.'.destroy', [encrypt($obj->id)])}}" class="text-danger webadmin-btn-warning-popup float-end" data-message="Are you sure to delete?  Associated data will be removed if it is deleted." title="' . ($obj->updated_at ? 'Last updated at : ' . date('d/m/Y - h:i a', strtotime($obj->updated_at)) : '') . '"><i class="fa fa-trash"></i></a>
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