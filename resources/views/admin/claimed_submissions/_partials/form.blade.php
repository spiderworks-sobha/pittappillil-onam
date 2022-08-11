<div class="content">
    <div class="container">
        <div class="page-title">
            <h3 class="text-uppercase">Winner Details</h3>
        </div>
        <div class="row">

            <div id="success-holder" style="display:none;" class="alert alert-success alert-dismissible fade show">
                
            </div>

            <div class="col-lg-12">
                <div class="card no-border aster-card">
                    <div class="card-body">
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
                                    <label for="invoice">Branch: </label>
                                    <b>{{$obj->branch}}</b>
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
                                    <label for="invoice">Claimed On: </label>
                                    <b>{{date('d M, Y h:i A', strtotime($obj->claimed_on))}}</b>
                                </div>
                                <hr/>
                                @if($obj->note)
                                <div class="form-group">
                                    <label for="invoice">Note: </label>
                                    <b>{!! nl2br($obj->note) !!}</b>
                                </div>
                                <hr/>
                                @endif
                                <div class="">
                                    <div class="col-sm-12">
                                        <div class="lead-button-block">
                                            <div>
                                                <a id="close-modal" data-dismiss="modal" class="btn btn-secondary mb-2 lead-cancel-btn"><i class="fas fa-times"></i> Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>