@extends("crudbooster::admin_template")
@section("content")

    <ul class="nav nav-pills nav-secondary">
        <li class="nav-item" role="presentation"><a class="nav-link" href="{{Route('ModulsControllerGetStep1')."/".$id}}"><i class='fa fa-info'></i> Step 1 - Module Information</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" href="{{Route('ModulsControllerGetStep2')."/".$id}}"><i class='fa fa-table'></i> Step 2 - Table Display</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link" href="{{Route('ModulsControllerGetStep3')."/".$id}}"><i class='fa fa-plus-square-o'></i> Step 3 - Form Display</a></li>
        <li class="nav-item" role="presentation"><a class="nav-link active" href="{{Route('ModulsControllerGetStep4')."/".$id}}"><i class='fa fa-wrench'></i> Step 4 - Configuration</a></li>
    </ul>

    <div class="card">
        <div class="card-header">
            <h1 class="box-title">Configuration</h1>
        </div>
        <form method='post' action='{{Route('ModulsControllerPostStepFinish')}}'>
            {{csrf_field()}}
            <input type="hidden" name="id" value='{{$id}}'>
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Title Field Candidate</label>
                            <input type="text" name="title_field" value="{{$cb_title_field}}" class='form-control'>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Limit Data</label>
                            <input type="number" name="limit" value="{{$cb_limit}}" class='form-control'>
                        </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="form-group">
                            <label>Order By</label>
                            <?php
                            if (is_array($cb_orderby)) {
                                $orderby = [];
                                foreach ($cb_orderby as $k => $v) {
                                    $orderby[] = $k.','.$v;
                                }
                                $orderby = implode(";", $orderby);
                            } else {
                                $orderby = $cb_orderby;
                            }
                            ?>
                            <input type="text" name="orderby" value="{{$orderby}}" class='form-control'>
                            <div class="help-block">E.g : column_name,desc</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Global Privilege</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="global_privilege_true" name="global_privilege" class="custom-control-input" {{($cb_global_privilege)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="global_privilege_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="global_privilege_false" name="global_privilege" class="custom-control-input" {{(!$cb_global_privilege)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="global_privilege_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Button Table Action</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_table_action_true" name="button_table_action" class="custom-control-input" {{($cb_button_table_action)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="button_table_action_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_table_action_false" name="button_table_action" class="custom-control-input" {{(!$cb_button_table_action)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="button_table_action_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Bulk Action Button</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_bulk_action_true" name="button_bulk_action" class="custom-control-input" {{($cb_button_bulk_action)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="button_bulk_action_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_bulk_action_false" name="button_bulk_action" class="custom-control-input" {{(!$cb_button_bulk_action)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="button_bulk_action_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Button Action Style</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_action_style_button_icon" name="button_action_style" class="custom-control-input" {{($cb_button_action_style=='button_icon')?"checked":""}} value='button_icon'>
                                            <label class="custom-control-label" for="button_action_style_button_icon">Icon</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_action_style_button_icon_text" name="button_action_style" class="custom-control-input" {{($cb_button_action_style=='button_icon_text')?"checked":""}} value='button_icon_text'>
                                            <label class="custom-control-label" for="button_action_style_button_icon_text">Icon & Text</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_action_style_button_text" name="button_action_style" class="custom-control-input" {{($cb_button_action_style=='button_text')?"checked":""}} value='button_text'>
                                            <label class="custom-control-label" for="button_action_style_button_text">Button Text</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_action_style_button_dropdown" name="button_action_style" class="custom-control-input" {{($cb_button_action_style=='button_dropdown')?"checked":""}} value='button_dropdown'>
                                            <label class="custom-control-label" for="button_action_style_button_dropdown">Dropdown</label>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Button Add</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_add_true" name="button_add" class="custom-control-input" {{($cb_button_add)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="button_add_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="button_add_false" name="button_add" class="custom-control-input" {{(!$cb_button_add)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="button_add_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Button Edit</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_edit_true" name="button_edit" class="custom-control-input" {{($cb_button_edit)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="cb_button_edit_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_edit_false" name="button_edit" class="custom-control-input" {{(!$cb_button_edit)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="cb_button_edit_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Button Delete</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_delete_true" name="button_delete" class="custom-control-input" {{($cb_button_delete)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="cb_button_delete_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_delete_false" name="button_delete" class="custom-control-input" {{(!$cb_button_delete)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="cb_button_delete_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Button Detail</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_detail_true" name="button_detail" class="custom-control-input" {{($cb_button_detail)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="cb_button_detail_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_detail_false" name="button_detail" class="custom-control-input" {{(!$cb_button_detail)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="cb_button_detail_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>

                    <div class="col-sm-4">
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Button Show Data</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_show_true" name="button_show" class="custom-control-input" {{($cb_button_show)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="cb_button_show_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_show_false" name="button_show" class="custom-control-input" {{(!$cb_button_show)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="cb_button_show_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Button Filter & Sorting</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_filter_true" name="button_filter" class="custom-control-input" {{($cb_button_filter)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="cb_button_filter_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_filter_false" name="button_filter" class="custom-control-input" {{(!$cb_button_filter)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="cb_button_filter_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Button Import</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_import_true" name="button_import" class="custom-control-input" {{($cb_button_import)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="cb_button_import_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_import_false" name="button_import" class="custom-control-input" {{(!$cb_button_import)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="cb_button_filter_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="col-sm-8">Show Button Export</label>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_export_true" name="button_export" class="custom-control-input" {{($cb_button_export)?"checked":""}} value='true'>
                                            <label class="custom-control-label" for="cb_button_export_true">TRUE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cb_button_export_false" name="button_export" class="custom-control-input" {{(!$cb_button_export)?"checked":""}} value='false'>
                                            <label class="custom-control-label" for="cb_button_filter_false">FALSE</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="box-footer">
                <div align="right" class="p-3">
                    <button type="button" onclick="location.href='{{CRUDBooster::mainpath('step3').'/'.$id}}'" class="btn btn-sm btn-danger">&laquo; Back</button>
                    <input type="submit" name="submit" class='btn btn-primary form-control-sm' value='Save Module'>
                </div>
            </div>
        </form>
    </div>


@endsection
